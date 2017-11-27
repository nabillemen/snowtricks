<?php

namespace SnowTricksBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Yaml\Yaml;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\Console\Helper\ProgressBar;
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
                This action is done by parsing the app/init/init.yml file.
                This command assumes that the image paths are relative, the top project folder being the app/init/ folder.
                The file init.yml should already exist, and provide a model of what is expected by the command.'
            );
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $container = $this->getContainer();
        $configDir = $container->getParameter('kernel.project_dir') . '/app/init/';

        try {
            $data = Yaml::parse(file_get_contents($configDir.'init.yml'));
        } catch (\Exception $e) {
            $output->writeln($e->getMessage());
            exit();
        }

        $barScale = isset($data['categories']) ? count($data['categories']): 0;
        $barScale += isset($data['tricks']) ? count($data['tricks']): 0;
        $bar = new ProgressBar($output, $barScale);

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

                $errors = $validator->validate($category);
                if (!empty((string) $errors)) {
                    $output->writeln("\n".(string) $errors);
                    exit();
                }

                $categories[$categoryName] = $category;
                $em->persist($category);

                $bar->advance();
            }
        } else {
            $output->writeln("\n".'There should be at least one category...');
            exit();
        }

        $em->flush();

        $tricks = array();
        if (!empty($data['tricks'])) {
            foreach ($data['tricks'] as $name => $fields) {
                $trick = new Trick();
                $trick->setName($name);

                if (empty($fields['description'])) {
                    $output->writeln("\n".'Trick named '.$name.' has no description...');
                    $this->rollback($categories, $tricks);
                    exit();
                } else {
                    $trick->setDescription($fields['description']);
                }

                if (empty($fields['category']) ||
                        !(array_key_exists($fields['category'], $categories))) {
                    $output->writeln("\n".'Trick named '.$name.' has no valid category...');
                    $this->rollback($categories, $tricks);
                    exit();
                } else {
                    $trick->setCategory($categories[$fields['category']]);
                }

                if (empty($fields['videos'])) {
                    $this->rollback($categories, $tricks);
                    $output->writeln("\n".'Trick named '.$name.' has no video...');
                    exit();
                } else {
                    foreach ($fields['videos'] as $videoTag) {
                        if (empty($videoTag)) {
                            $output->writeln("\n".'A video has no tag...');
                            $this->rollback($categories, $tricks);
                            exit();
                        }

                        $video = new Video();
                        $video->setTag($videoTag);
                        $trick->addVideo($video);
                    }
                }

                if (empty($fields['images'])) {
                    $this->rollback($categories, $tricks);
                    $output->writeln("\n".'Trick named '.$name.' has no image...');
                    exit();
                } else {
                    foreach ($fields['images'] as $imageName) {
                        if (empty($imageName)) {
                            $output->writeln("\n".'An image has no file path...');
                            $this->rollback($categories, $tricks);
                            exit();
                        }

                        $tempImageName = 'temp-'.$imageName;

                        $imageFolder = $configDir.'img/';
                        if (file_exists($imageFolder.$imageName)) {
                            try {
                                copy($imageFolder.$imageName, $imageFolder.$tempImageName);
                            } catch (\Exception $e) {
                                $this->rollback($categories, $tricks);
                                $output->writeln("\n".'Something went wrong at opening of image '.$imageFolder.$imageName.'...');
                                exit();
                            }
                        } else {
                            $output->writeln("\n".'Image '.$imageFolder.$imageName.' doesn\'t exist');
                            $this->rollback($categories, $tricks);
                            exit();
                        }
                        $image = new Image();
                        $image->setFile(new File($imageFolder.$tempImageName));
                        $trick->addImage($image);
                    }
                }

                $errors = $validator->validate($trick);
                if (!empty((string) $errors)) {
                    $output->writeln("\n".(string) $errors);
                    $this->rollback($categories, $tricks);
                    exit();
                }

                $tricks[] = $trick;
                $em->persist($trick);

                $bar->advance();
            }
        }

        $em->flush();

        $bar->finish();
    }

    protected function rollback(array $categories, array $tricks)
    {
        $em = $this->getContainer()->get('doctrine.orm.entity_manager');
        foreach ($tricks as $trick) {
            $em->remove($trick);
        }
        foreach ($categories as $category) {
            $em->remove($category);
        }
        $em->flush();
    }
}
