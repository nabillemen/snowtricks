<?php

namespace SnowTricksBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Yaml\Yaml;
use Symfony\Component\HttpFoundation\File\File;
use SnowTricksBundle\Entity\Category;
use SnowTricksBundle\Entity\Image;
use SnowTricksBundle\Entity\Video;
use SnowTricksBundle\Entity\Trick;

class InitializeCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this
            ->setName('snowtricks:initialize')
            ->setDescription('Initializes the application')
            ->setHelp(
                'This command allows you to persist the trick categories and a sample of tricks in the database, so as to initialize the application.
                This action is done by parsing the SnowTricksBundle/Resources/config/init/init.yml file.
                This command assumes that the image paths are relative, the top project folder being the root.
                The file init.yml should already exist, and provide a model of what is expected by the command.'
            );
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $container = $this->getContainer();
        $path = $container->getParameter('kernel.project_dir') . '/';
        $configDir = $path . 'src/SnowTricksBundle/Resources/config/init/';

        try {
            $data = Yaml::parse(file_get_contents($configDir.'init.yml'));
        } catch (\Exception $e) {
            $output->writeln($e->getMessage());
            exit();
        }

        $em = $container->get('doctrine.orm.entity_manager');
        $validator = $container->get('validator');
        $categories = array();
        if (!empty($data['categories'])) {
            foreach ($data['categories'] as $categoryName) {
                if (empty($categoryName)) {
                    $output->writeln('A category has no name...');
                    exit();
                }

                $category = new Category();
                $category->setName($categoryName);
                $categories[$categoryName] = $category;

                $errors = $validator->validate($category);
                if (!empty((string) $errors)) {
                    $output->writeln((string) $errors);
                    exit();
                }

                $em->persist($category);
            }
        } else {
            $output->writeln('There should be at least one category...');
            exit();
        }

        $em->flush();

        if (!empty($data['tricks'])) {
            foreach ($data['tricks'] as $name => &$fields) {
                $trick = new Trick();
                $trick->setName($name);

                if (empty($fields['description'])) {
                    $this->rollback($categories);
                    $output->writeln('Trick named '.$name.' has no description...');
                    exit();
                } else {
                    $trick->setDescription($fields['description']);
                }

                if (empty($fields['category']) ||
                        !(array_key_exists($fields['category'], $categories))) {
                    $this->rollback($categories);
                    $output->writeln('Trick named '.$name.' has no valid category...');
                    exit();
                } else {
                    $trick->setCategory($categories[$fields['category']]);
                }

                if (empty($fields['videos'])) {
                    $this->rollback($categories);
                    $output->writeln('Trick named '.$name.' has no video...');
                    exit();
                } else {
                    foreach ($fields['videos'] as $videoTag) {
                        if (empty($videoTag)) {
                            $this->rollback($categories);
                            $output->writeln('A video has no tag...');
                            exit();
                        }

                        $video = new Video();
                        $video->setTag($videoTag);
                        $trick->addVideo($video);
                    }
                }

                if (empty($fields['images'])) {
                    $this->rollback($categories);
                    $output->writeln('Trick named '.$name.' has no image...');
                    exit();
                } else {
                    foreach ($fields['images'] as $imageName) {
                        if (empty($imageName)) {
                            $this->rollback($categories);
                            $output->writeln('An image has no file path...');
                            exit();
                        }

                        $tempImageName = 'temp-'.$imageName;
                        if (file_exists($configDir.$imageName)) {
                            try {
                                copy($configDir.$imageName, $configDir.$tempImageName);
                            } catch (\Exception $e) {
                                $this->rollback($categories);
                                $output->writeln('Something went wrong at opening of image '.$configDir.$imageName.'...');
                                exit();
                            }
                        } else {
                            $this->rollback($categories);
                            $output->writeln('Image '.$configDir.$imageName.' doesn\'t exist');
                            exit();
                        }
                        $image = new Image();
                        $image->setFile(new File($configDir.$tempImageName));
                        $trick->addImage($image);
                    }
                }

                $errors = $validator->validate($trick);
                if (!empty((string) $errors)) {
                    $this->rollback($categories);
                    $output->writeln((string) $errors);
                    exit();
                }

                $em->persist($trick);
            }
        }

        $em->flush();
    }

    protected function rollback(array $categories)
    {
        $em = $this->getContainer()->get('doctrine.orm.entity_manager');
        foreach ($categories as $category) {
            $em->remove($category);
        }
        $em->flush();
    }
}
