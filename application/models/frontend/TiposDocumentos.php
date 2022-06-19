<?php  

    Class TiposDocumentos extends CI_Model {
    	public function __construct() {
    		parent::__construct();
    	}

    	public function tiposDocumentos() {
    		$this->db->select('*');
    		$this->db->from('gm_tipos_documentos');
    		$this->db->order_by('tipo_documento', 'asc');
    		$result = $this->db->get();
    		return $result->result();
    	}
    }

?>