<?php
/*

	Copyright (C) 2015

	This program is free software: you can redistribute it and/or modify
	it under the terms of the GNU General Public License as published by
	the Free Software Foundation, either version 3 of the License, or
	(at your option) any later version.

	This program is distributed in the hope that it will be useful,
	but WITHOUT ANY WARRANTY; without even the implied warranty of
	MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
	GNU General Public License for more details.

	You should have received a copy of the GNU General Public License
	along with this program.  If not, see <http://www.gnu.org/licenses/>.

	/////////////////////////////////////////////////////////////////////////
	Clase SMARTIU
	=======================
	Manejo de la interfaz

*/




//================================
class SMARTTAB {

	private $s          = "\n";
	private $dataHead   = array();
	private $dataRow    = array();
	private $dataCell   = array();


	//********************************************
	public function __construct($id = null, $class = "table") {
	
		$this->s = "<table id=\"$id\" class=\"$class\" >";
	}



	//********************************************
	public function head ($id = null, $class = null, $width = null, $content = null ) { 
		
		$this->dataHead[count($this->dataHead)] = array(
			 'id'           => $id
			,'class'        => $class
			,'width'     	=> $width
			,'content'		=> $content

		);

	}


	//********************************************
	public function row ($id = null, $class = null) { 

		static $cont;

		$cont = count($this->dataRow);

		$this->dataRow[$cont]['id']     = $id;
		$this->dataRow[$cont]['class']  = $class;

		$this->dataCell[$id] = array();

	}


	//********************************************
	public function cell ($id = null, $class = null, $colspan = null, $content = null) { 

		static $rowid;

		$rowid = $this->dataRow[count($this->dataRow)-1]['id'];
		
		$this->dataCell[$rowid][count($this->dataCell[$rowid])] = array(
			 'id'       => $id
			,'class'    => $class
			,'colspan'  => $colspan
			,'content'  => $content
		);

	}


	//********************************************
	public function pintar () { 
	
		
		$this->s .= "\n<thead><tr>\n";

		for ($i=0; $i < count($this->dataHead); $i++) { 
			
			if (isset($this->dataHead[$i])) {
				
				$this->s .= "\n
					<th id=\"".$this->dataHead[$i]['id']."\" class=\"".$this->dataHead[$i]['class']."\" width=\"".$this->dataHead[$i]['width']."\" >"
					.$this->dataHead[$i]['content']
					."</th>
				";

			}

		}

		$this->s .= "\n</tr></thead>";

		for ($i=0; $i < count($this->dataRow); $i++) { 
			
			if (isset($this->dataRow[$i]['id'])) {
				
				$id = $this->dataRow[$i]['id'];

				$this->s .= "\n<tr id=\"".$this->dataRow[$i]['id']."\" class=\"".$this->dataRow[$i]['class']."\">";
//showX($this->dataCell);
				for ($h=0; $h < count($this->dataCell[$id]); $h++) { 
					$this->s .= "\n
						<td id=\"".$this->dataCell[$id][$h]['id']."\" class=\"".$this->dataCell[$id][$h]['class']."\">"
						.$this->dataCell[$id][$h]['content']
						."</td>
					";
				}

				$this->s .= "\n</tr>";

			}

		}

		$this->s .= "\n</table>";

		return $this->s;
	}

}

/*
row [7]
cell [7]{
	[0]{id,class,content}
	[0]{id,class,content}
}


	new FORM (id, name, classes, action, method, autocomplete)
	form -> button (id, name, classes)
	form -> input (label, id, name, classes, attrs, )
	form -> select (label, id, name, classes, attrs, )
	form -> textarea (label, id, name, classes, attrs, )
	form -> file (label, id, name, classes, attrs, text_button)

	new tab (iu)
	tab -> head (id, classes (lista1,r,j,j,z10))
	tab -> headcell (id, classes (lista1,r,j,j,z10), colspan, content)
	tab -> row (id, classes (lista1,r,j,j,z10))
	tab -> row -> cell (id, classes (lista1,r,j,j,z10), colspan, content)
	tab -> food (id, classes (lista1,r,j,j,z10))
	tab -> foodcell (id, classes (lista1,r,j,j,z10), colspan, content) (PAGINACION??)
	


*/
?>
