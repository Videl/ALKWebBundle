<?php

namespace ALK\WebBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * ArticleRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class ArticleRepository extends EntityRepository
{
	public function findTitleById($id)
	{
		$repository = $this->getDoctrine()
    		->getRepository('ALKWebBundle:Article');

		$query = $repository->createQueryBuilder()
			->select('partial Article.{title}')
			->where('id = :id')
			->setParameter('id', $id)
			->getQuery();

	    try {
	        return $query->getSingleResult();
	    } catch (\Doctrine\ORM\NoResultException $e) {
	        return null;
	    }
	}

	public function myFindAllArticles()
    {
        $qb = $this->createQueryBuilder('a');
        $qb->add('orderBy', 'a.id DESC');


        return $qb->getQuery()->getResult();
    }

    public function myLastArticle()
    {
        return $this->findBy(array(), array('id'=>'DESC'), 1);
    }


    public function myFindByTags(array $nom_tags)
    {
        $qb = $this->createQueryBuilder('a');

        $qb ->join('a.tags', 't')
            ->where($qb->expr()->in('t.name', $nom_tags))
            ->add('orderBy', 'a.id DESC');

        return $qb->getQuery()
                   ->getResult();
    }

}
