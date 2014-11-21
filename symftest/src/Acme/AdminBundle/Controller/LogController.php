<?php

namespace Acme\AdminBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Acme\AdminBundle\Entity\Log;
use Acme\AdminBundle\Form\LogType;

/**
 * Log controller.
 *
 */
class LogController extends Controller
{

    /**
     * Lists all Log entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('AcmeAdminBundle:Log')->findAll();

        return $this->render('AcmeAdminBundle:Log:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Log entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Log();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('log_show', array('id' => $entity->getId())));
        }

        return $this->render('AcmeAdminBundle:Log:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a Log entity.
     *
     * @param Log $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Log $entity)
    {
        $form = $this->createForm(new LogType(), $entity, array(
            'action' => $this->generateUrl('log_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Log entity.
     *
     */
    public function newAction()
    {
        $entity = new Log();
        $form   = $this->createCreateForm($entity);

        return $this->render('AcmeAdminBundle:Log:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Log entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AcmeAdminBundle:Log')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Log entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('AcmeAdminBundle:Log:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Log entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AcmeAdminBundle:Log')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Log entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('AcmeAdminBundle:Log:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Log entity.
    *
    * @param Log $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Log $entity)
    {
        $form = $this->createForm(new LogType(), $entity, array(
            'action' => $this->generateUrl('log_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Log entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AcmeAdminBundle:Log')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Log entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('log_edit', array('id' => $id)));
        }

        return $this->render('AcmeAdminBundle:Log:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Log entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('AcmeAdminBundle:Log')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Log entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('log'));
    }

    /**
     * Creates a form to delete a Log entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('log_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }


    /**
     * Creates a new Log entity.
     *
     */
    public function uploadAction(Request $request)
    {
        $file = $request->files->get('log_file');

        if(!empty($file))
        {
            $path = $this->getUploadRootDir();

            if(!is_dir($path))
                mkdir($path);

            $name = $file->getClientOriginalName();
            $ext = $file->guessExtension();

            $file->move($path,$name.'.'.$ext);

            $lines = file($path.'/'.$name.'.'.$ext);

            foreach($lines as $key=>$line)
            {
                if($key>=0)
                {
                    $line_array = explode(" ",$line);

                    if(is_array($line_array) && count($line_array)>=9)
                    {
                        list($ip, $dash, $dash1, $date, $date1, $url1, $url2, $url3, $port, $port1) = $line_array;
                        $date = $date.' '.$date1;
                        $date = str_replace('/','-',$date);
                        $url = $url1.' '.$url2.' '.$url3;

                        $log = new Log();
                        $log->setIp($ip);
                        $log->setTime($date);
                        $log->setUrl($url);

                        $em = $this->getDoctrine()->getManager();
                        $em->persist($log);
                        $em->flush();

                        unset($em);
                        unset($log);

                    }
                }
            }
        }

        return $this->redirect($this->generateUrl('log'));

    }

    protected function getUploadRootDir()
    {
        // the absolute directory path where uploaded
        // documents should be saved

        return $this->get('kernel')->getRootDir().'/'.$this->getUploadDir();
    }

    protected function getUploadDir()
    {
        // get rid of the __DIR__ so it doesn't screw up
        // when displaying uploaded doc/image in the view.
        return 'uploads/documents';
    }

    protected function SQL_date($date=false)
    {
        return date('Y-m-d H:i:s', !$date?time():strtotime($date));
    }
}
