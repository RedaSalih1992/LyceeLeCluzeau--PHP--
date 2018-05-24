<?php
header( 'content-type: text/html; charset=utf-8' );
class Resultat1
{
    public $cle;
	public $signe;
	public $difference;
	public $position;
	public $moteur;
	public $titre;
	public $page;
	 public function getCle()
    {
        return $this->cle;
    }
    
    public function setCle($cle)
    {
        $this->cle = $cle;
	
	}
	

	
	public function getSigne()
    {
        return $this->signe;
    }
    
    public function setSigne($signe)
    {
        $this->signe = $signe;
	
	}
	
	public function getDifference()
    {
        return $this->difference;
    }
    
    public function setDifference($difference)
    {
        $this->difference = $difference;
	
	}
	public function getPosition()
    {
        return $this->position;
    }
    
    public function setPosition($position)
    {
        $this->position = $position;
	
	}
	public function getMoteur()
    {
        return $this->moteur;
    }
	  public function setMoteur($moteur)
    {
        $this->moteur = $moteur;
	
	}
	public function getTitre()
    {
        return $this->titre;
    }
	  public function setTitre($titre)
    {
        $this->titre = $titre;
	
	}
	public function getPage()
    {
        return $this->page;
    }
	  public function setPage($page)
    {
        $this->page = $page;
	
	}
	
	
}
?>