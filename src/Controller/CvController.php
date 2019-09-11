<?php

namespace App\Controller;

use App\Entity\About;
use App\Repository\AboutRepository;
use App\Repository\EducationRepository;
use App\Repository\ExperienceRepository;
use App\Repository\ProjectRepository;
use App\Repository\RecommendationRepository;
use App\Repository\SkillRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CvController extends AbstractController
{
    /**
     * @Route("/", name="cv")
     * @param AboutRepository $aboutRepository
     * @param SkillRepository $skillRepository
     * @param ExperienceRepository $experienceRepository
     * @param EducationRepository $educationRepository
     * @param ProjectRepository $projectRepository
     * @param RecommendationRepository $recommendationRepository
     * @return Response
     */
    public function index(AboutRepository $aboutRepository, SkillRepository $skillRepository,
                            ExperienceRepository $experienceRepository, EducationRepository $educationRepository,
                            ProjectRepository $projectRepository, RecommendationRepository $recommendationRepository)
    {
        $about = $aboutRepository->findOneBy(['id' => '1']);
        /*$about = $this->getDoctrine()
            ->getRepository(About::class)
            ->findOneBy(['id' => '1']);*/

//        test appel fonction
//        $skills = $this->mySkill($skillRepository);

        return $this->render('cv/index.html.twig', [
            'about' => $about,
            'skills' => $skillRepository->findAll(),
            'experiences' => $experienceRepository->findBy([],['id' => 'desc']), // premier paramètre tableau vide = findAll()
            'educations' => $educationRepository->findBy([],['id' => 'desc']),
            'projects' => $projectRepository->findAll(),
            'recommendations' => $recommendationRepository->findAll(),
        ]);
    }

    /**
     * @param SkillRepository $skillRepository
     * @return Response
     */

   /* public function mySkill(SkillRepository $skillRepository)
    {
        $skills = $skillRepository->findAll();

        return $this->render('cv/skill.html.twig', [
           'skills' => $skills,
        ]);

    }*/


}
