<?php
    class FazerUpload{
        private $pdfPath;
        public function __construct(){
            if (isset($_FILES['arquivo']) && $_FILES['arquivo']['error'] === UPLOAD_ERR_OK) {
                // Informações do arquivo
                $nomeArquivo = $_FILES['arquivo']['name'];
                $tipoArquivo = $_FILES['arquivo']['type'];
                $tamanhoArquivo = $_FILES['arquivo']['size'];
                $arquivoTemp = $_FILES['arquivo']['tmp_name'];
        
                // Definir o diretório de destino
                $diretorioDestino = 'arquivos/uploads/';

                $novoNomeArquivo = uniqid('arquivo_') . "." . pathinfo($nomeArquivo, PATHINFO_EXTENSION);
                $caminhoArquivo = $diretorioDestino . $novoNomeArquivo;
        
                move_uploaded_file($arquivoTemp, $caminhoArquivo);
                $this->setPdfPath($caminhoArquivo);
            }
        }

        public function getPdfPath(){
            return $this->pdfPath;
        }

        public function setPdfPath($caminhoArquivo){
            $this->pdfPath = $caminhoArquivo;
            return $this;
        }
    }
?>