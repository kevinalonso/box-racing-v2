<?php

namespace App\Controller;

use App\Entity\Announcement;
use App\Entity\Category;
use App\Entity\StaticPage;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CategoryController extends AbstractController
{
	/**
	* @Route("/category/{id}")
	*/
	public function category(int $id): Response
    {

    	$announcements = $this->getDoctrine()->getRepository(Announcement::class)
            ->getAnnoucementFromCategory($id);

        if ($announcements != null) {

            $catName = $announcements[0];

            $cat = $this->getDoctrine()->getRepository(Category::class)
            ->getCategory($id);

            return $this->render('category.html.twig', [
                'announcements' => $announcements,
                'titleCat' => $catName,
                'cat'=>$cat[0]->getId()
            ]);

        } else {
            return $this->render('category.html.twig', [
                'announcements' => $announcements,
                'titleCat' => 'Pas de motos d\'occasion en vente pour le moment'
            ]);
        }
        
      
    	return $this->render('category.html.twig', [
            'announcements' => $announcements,
            'titleCat' => $catName
        ]);
    }

    /**
    * @Route("/category/static/{id}")
    */
    public function static(int $id) : Response
    {

        $static = $this->getDoctrine()->getRepository(StaticPage::class)
            ->getStaticFromCategory($id);

        return $this->render('staticpage.html.twig', [
            'static' => $static
        ]);
    }
}