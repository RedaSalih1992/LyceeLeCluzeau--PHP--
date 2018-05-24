<?php
header( 'content-type: text/html; charset=utf-8' );
class Specialite
{
    public $position;
	public $moteur;
	public $cle;
	public $site;
	public $page;
	public $titre;
	public $date;
	
	
    
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
	
	  public function getCle()
    {
        return $this->cle;
    }
    
    public function setCle($cle)
    {
        $this->cle = $cle;
	
	}
	
	  public function getSite()
    {
        return $this->site;
    }
    
    public function setSite($site)
    {
        $this->site = $site;
	
	}
	
	  public function getPage()
    {
        return $this->page;
    }
    
    public function setPage($page)
    {
        $this->page = $page;
	
	}
	
	public function getTitre()
    {
        return $this->titre;
    }
    
    public function setTitre($titre)
    {
        $this->titre = $titre;
	
	}
	
	public function getDate()
    {
        return $this->date;
    }
    
    public function setDate($date)
    {
        $this->date = $date;
	
	}
	
	
}
?>
