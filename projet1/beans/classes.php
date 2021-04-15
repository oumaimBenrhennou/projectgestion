    <?php


class classes {
    private $id;
    private $code;
    private $IdFiliere;
    
    function __construct($id, $code, $IdFiliere) {
        $this->id = $id;
        $this->code = $code;
        $this->IdFiliere = $IdFiliere;
    }
    
    function getId() {
        return $this->id;
    }

    function getCode() {
        return $this->code;
    }

    function getIdFiliere() {
        return $this->IdFiliere;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setCode($code) {
        $this->code = $code;
    }

    function setIdFiliere($IdFiliere) {
        $this->IdFiliere = $IdFiliere;
    }



}
