<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class InstaController extends AbstractController
{
   public $access_token ;
   public $username ;
   public $user_search;
    /**
     * @Route("/insta", name="insta")
     */
    public function index(): Response
    {
        $access_token = '30952597848'|'53dc7f5bc8e9efb755e17fff8e495e44';
        $username = 'rudrastyh';
        $user_search = rudr_instagram_api_curl_connect("https://api.instagram.com/v1/users/search?q=" . $username . "&access_token=" . $access_token);

        $user_id = $user_search->data[0]->id; // or use string 'self' to get your own media
        $return = rudr_instagram_api_curl_connect("https://api.instagram.com/v1/users/" . $user_id . "/media/recent?access_token=" . $access_token);

//var_dump( $return ); // if you want to display everything the function returns

        foreach ($return->data as $post) {
//            echo '<a href="' . $post->images->standard_resolution->url . '"><img src="' . $post->images->thumbnail->url . '" /></a>';
            $url = $post->images->thumbnail->url;
            dd($url);
        }


        return $this->render('insta/index.html.twig', [
            'url' => $url,
        ]);
    }
}
