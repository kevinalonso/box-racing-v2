<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;

class ContactController extends AbstractController
{
 
	/**
	* @Route("/contact")
	*/
	public function contact(): Response
    {
        return $this->render('contact.html.twig', []);
    }

    /** 
   * @Route("/sendmail") 
    */ 
    public function sendMail(Request $request, \Swift_Mailer $mailer)
    {
        $email = $request->request->get('email');
        $name = $request->request->get('name');
        $obj = $request->request->get('obj');
        $msg = $request->request->get('msg');
        $attachment = $request->files->get('nameFile');
        //$attachmentName = $request->request->get('nameFile');
        //$attachmentName = "path/attach/".$attachmentName;

        $message = (new \Swift_Message($obj))
            ->setFrom($email)
            ->setTo('k.alonso292@gmail.com')
            ->setBody($msg)
            ->attach(\Swift_Attachment::fromPath($attachment));
            //->setFilename($attachmentName);

        $mailer->send($message);
        return new JsonResponse(array(
            'status' => 'OK'
        ),
        200);
    }

}