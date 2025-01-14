<?php
    include_once("modelo/DAO/MedicamentoDAO_class.php");
    include_once("modelo/Objetos/Medicamento_class.php");
    include_once("modelo/DAO/PacienteDAO_class.php");
    include_once("modelo/Objetos/Paciente_class.php");
    include_once("modelo/DAO/MedicoDAO_class.php");
    include_once("modelo/Objetos/Medico_class.php");
    include_once("modelo/DAO/SolicitacaoDAO_class.php");
    include_once("modelo/Objetos/Solicitacao_class.php");
    include_once("modelo/DAO/RequerimentoDAO_class.php");
    include_once("modelo/Objetos/Requerimento_class.php");
    include_once("controle/FazerUpload_class.php");

    class CadastrarSolicitacao{
        public function __construct(){
            if(isset($_POST["solicitar"])){
                $upload = new FazerUpload();
                $pdfPath = $upload->getPdfPath();

                $pDao = new PacienteDAO();
                $p = $pDao->getPaciente($_POST['opcoesPac']);
                $medicamentoDao = new MedicamentoDAO();
                $medicamento = $medicamentoDao->getMedicamento($_POST['opcoesMed']);
                $medicoDao = new MedicoDAO();
                $medico = $medicoDao->getMedicoByUserId($_SESSION["id"]);
                
                $s = new Solicitacao();
                $s->setPaciente($p);
                $s->setMedicamento($medicamento);
                $s->setMedico($medico);
                $s->setEstadoSolicitacao("Aguardando deferimento");
                $s->setDataSolicitacao(date("Y-m-d"));
                
                $sDao = new SolicitacaoDAO();
                $idSolicitacao = $sDao->cadastrar($s);

                $req = new Requerimento($pdfPath, $sDao->getSolicitacao($idSolicitacao));
                $rDao = new RequerimentoDAO();
                $rDao->cadastrar($req);

                $status = "Solicitação enviada!";
                include_once("visao/Modulos/solicitacaoMedicamento.php");
                
            }
            else{
                $mDao = new MedicamentoDao();
                $pDao = new PacienteDao();
                
                if(isset($_GET["busca"])) {
                    if($_GET["busca"] == "med"){
                        $listaMed = $mDao->getMedicamentos($_GET["med"]);
                        foreach($listaMed as $med){
                            echo "<option value = '" . $med->getIdMed() . "'>" . $med->getNome() . " | " . $med->getNumRegistro() . "</option>";
                        }
                    } elseif($_GET["busca"] == "pac"){
                        $listaPac = $pDao->getPacientes($_GET["pac"]);
                        foreach($listaPac as $pac){
                            echo "<option value = '" . $pac->getIdPaciente() . "'>" . $pac->getNome() . " | " . $pac->getCpf() . "</option>";
                        }
                    }
                }
                else include_once("visao/Modulos/solicitacaoMedicamento.php");
            }
        }
    }
?>