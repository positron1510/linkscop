<?php

use Symfony\Component\Routing\Exception\MethodNotAllowedException;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\RequestContext;

/**
 * appProdUrlMatcher.
 *
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class appProdUrlMatcher extends Symfony\Bundle\FrameworkBundle\Routing\RedirectableUrlMatcher
{
    /**
     * Constructor.
     */
    public function __construct(RequestContext $context)
    {
        $this->context = $context;
    }

    public function match($pathinfo)
    {
        $allow = array();
        $pathinfo = rawurldecode($pathinfo);
        $context = $this->context;
        $request = $this->request;

        // show_task
        if ($pathinfo === '/taskShow') {
            if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                $allow = array_merge($allow, array('GET', 'HEAD'));
                goto not_show_task;
            }

            return array (  '_format' => 'json',  '_controller' => 'AppBundle\\Controller\\AjaxController::listAction',  '_route' => 'show_task',);
        }
        not_show_task:

        if (0 === strpos($pathinfo, '/remove')) {
            // remove_task
            if (0 === strpos($pathinfo, '/removeTask') && preg_match('#^/removeTask/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_remove_task;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'remove_task')), array (  '_format' => 'json',  '_controller' => 'AppBundle\\Controller\\AjaxController::removeTaskAction',));
            }
            not_remove_task:

            // remove_user
            if (0 === strpos($pathinfo, '/removeUser') && preg_match('#^/removeUser/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_remove_user;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'remove_user')), array (  '_format' => 'json',  '_controller' => 'AppBundle\\Controller\\AjaxController::removeUserAction',));
            }
            not_remove_user:

        }

        // user
        if (0 === strpos($pathinfo, '/user') && preg_match('#^/user/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
            if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                $allow = array_merge($allow, array('GET', 'HEAD'));
                goto not_user;
            }

            return $this->mergeDefaults(array_replace($matches, array('_route' => 'user')), array (  '_format' => 'json',  '_controller' => 'AppBundle\\Controller\\AjaxController::userAction',));
        }
        not_user:

        // list_task
        if (rtrim($pathinfo, '/') === '') {
            if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                $allow = array_merge($allow, array('GET', 'HEAD'));
                goto not_list_task;
            }

            if (substr($pathinfo, -1) !== '/') {
                return $this->redirect($pathinfo.'/', 'list_task');
            }

            return array (  '_controller' => 'AppBundle\\Controller\\TaskController::listAction',  '_route' => 'list_task',);
        }
        not_list_task:

        // task_project
        if (0 === strpos($pathinfo, '/project') && preg_match('#^/project/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
            if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                $allow = array_merge($allow, array('GET', 'HEAD'));
                goto not_task_project;
            }

            return $this->mergeDefaults(array_replace($matches, array('_route' => 'task_project')), array (  '_controller' => 'AppBundle\\Controller\\TaskController::projectAction',));
        }
        not_task_project:

        // create_task
        if ($pathinfo === '/create') {
            if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                goto not_create_task;
            }

            return array (  '_controller' => 'AppBundle\\Controller\\TaskController::createAction',  '_route' => 'create_task',);
        }
        not_create_task:

        // restart_task
        if (0 === strpos($pathinfo, '/restart') && preg_match('#^/restart/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
            if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                goto not_restart_task;
            }

            return $this->mergeDefaults(array_replace($matches, array('_route' => 'restart_task')), array (  '_controller' => 'AppBundle\\Controller\\TaskController::restartAction',));
        }
        not_restart_task:

        // login
        if ($pathinfo === '/login') {
            if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                goto not_login;
            }

            return array (  '_controller' => 'AppBundle\\Controller\\UserController::loginAction',  '_route' => 'login',);
        }
        not_login:

        // list_user
        if ($pathinfo === '/users') {
            if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                $allow = array_merge($allow, array('GET', 'HEAD'));
                goto not_list_user;
            }

            return array (  '_controller' => 'AppBundle\\Controller\\UserController::listAction',  '_route' => 'list_user',);
        }
        not_list_user:

        // registration
        if ($pathinfo === '/registration') {
            if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                goto not_registration;
            }

            return array (  '_controller' => 'AppBundle\\Controller\\UserController::registrationAction',  '_route' => 'registration',);
        }
        not_registration:

        // nelmio_api_doc_index
        if (0 === strpos($pathinfo, '/api/doc') && preg_match('#^/api/doc(?:/(?P<view>[^/]++))?$#s', $pathinfo, $matches)) {
            if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                $allow = array_merge($allow, array('GET', 'HEAD'));
                goto not_nelmio_api_doc_index;
            }

            return $this->mergeDefaults(array_replace($matches, array('_route' => 'nelmio_api_doc_index')), array (  '_controller' => 'Nelmio\\ApiDocBundle\\Controller\\ApiDocController::indexAction',  'view' => 'default',));
        }
        not_nelmio_api_doc_index:

        // logout
        if ($pathinfo === '/logout') {
            return array('_route' => 'logout');
        }

        throw 0 < count($allow) ? new MethodNotAllowedException(array_unique($allow)) : new ResourceNotFoundException();
    }
}
