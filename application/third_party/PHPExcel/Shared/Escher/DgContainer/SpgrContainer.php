<?php



class PHPExcel_Shared_Escher_DgContainer_SpgrContainer
{
	
	private $Vq20emrsdn3q;

	
	private $Vazquidyvoo2 = array();

	
	public function setParent($V3jkqexf4nr0)
	{
		$this->_parent = $V3jkqexf4nr0;
	}

	
	public function getParent()
	{
		return $this->_parent;
	}

	
	public function addChild($Vcnoizcxjx0n)
	{
		$this->_children[] = $Vcnoizcxjx0n;
		$Vcnoizcxjx0n->setParent($this);
	}

	
	public function getChildren()
	{
		return $this->_children;
	}

	
	public function getAllSpContainers()
	{
		$Vcn3ow2vxaqw = array();

		foreach ($this->_children as $Vcnoizcxjx0n) {
			if ($Vcnoizcxjx0n instanceof PHPExcel_Shared_Escher_DgContainer_SpgrContainer) {
				$Vcn3ow2vxaqw = array_merge($Vcn3ow2vxaqw, $Vcnoizcxjx0n->getAllSpContainers());
			} else {
				$Vcn3ow2vxaqw[] = $Vcnoizcxjx0n;
			}
		}

		return $Vcn3ow2vxaqw;
	}
}
