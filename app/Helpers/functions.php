<?php
use Telegram\Bot\Laravel\Facades\Telegram;

	if(!function_exists("Upload_Imagem_Cooperativa")){
		function Upload_Imagem_Cooperativa($request){
			try {
				/*file_put_contents(__DIR__.'/teste.txt',json_encode($request));   */
				$name=null;
	            
	            $imagem=$request->file('imagem');

	            $hora = time()+date("Ymd");

	            $name = $hora.'.'.$imagem->extension();

	            $imagem->move(public_path().'/cooperativas/', $name);  
	 
	           return $name;
			} catch (\Exception $e) {
				file_put_contents(__DIR__.'/ErroUpload.txt',json_encode($e->getMessage()));   
			}
		}
	}
	

?>