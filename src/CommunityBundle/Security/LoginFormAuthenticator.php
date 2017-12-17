<?php

namespace CommunityBundle\Security;

use Symfony\Component\Security\Guard\Authenticator\AbstractFormLoginAuthenticator;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\UserProviderInterface;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\Routing\RouterInterface;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Exception\UsernameNotFoundException;
use Symfony\Component\Security\Core\Exception\CustomUserMessageAuthenticationException;
use Symfony\Component\Security\Http\Util\TargetPathTrait;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoder;
use Doctrine\ORM\EntityManagerInterface;
use CommunityBundle\Form\LoginForm;

class LoginFormAuthenticator extends AbstractFormLoginAuthenticator
{
    use TargetPathTrait;

    private $formFactory;
    private $em;
    private $router;
    private $encoder;

    public function __construct(
        FormFactoryInterface $formFactory,
        EntityManagerInterface $em,
        RouterInterface $router,
        UserPasswordEncoder $encoder
    )
    {
        $this->formFactory = $formFactory;
        $this->em = $em;
        $this->router = $router;
        $this->encoder = $encoder;
    }

    public function getCredentials(Request $request)
    {
        $isLoginSubmit = $request->getPathInfo() == $this->router->generate('security_login')
                         && $request->getMethod() == 'POST';

        if (!$isLoginSubmit) {
            return;
        }

        $form = $this->formFactory->create(LoginForm::class);

        $form->handleRequest($request);
        $data = $form->getData();

        $request->getSession()->set(Security::LAST_USERNAME, $data['_username']);

        return $data;
    }

    public function getUser($credentials, UserProviderInterface $userProvider)
    {
        $username = $credentials['_username'];

        try {
            return $userProvider->loadUserByUsername($username);
        } catch (UsernameNotFoundException $e) {
            throw new CustomUserMessageAuthenticationException('Cet utilisateur n\'existe pas.');
        }
    }

    public function checkCredentials($credentials, UserInterface $user)
    {
        $password = $credentials['_password'];

        $isValid = $this->encoder->isPasswordValid($user, $password);

        if (!$isValid) {
            throw new CustomUserMessageAuthenticationException('Le mot de passe est incorrect.');
        } else {
            return true;
        }
    }

    public function onAuthenticationSuccess(Request $request, TokenInterface $token, $providerKey)
    {
        $targetPath = $this->getTargetPath($request->getSession(), $providerKey);

        if (!$targetPath) {
            $targetPath = $this->router->generate('trick_index');
        }

        return new RedirectResponse($targetPath);
    }

    protected function getLoginUrl()
    {
        return $this->router->generate('security_login');
    }
}
