<?php 

	class Ingeniero implements Humano, SerVivo{
		public function nacer(){
			echo "Ingeniero Nace";
		}
		public function crecer(){
			echo "Ingeniero crece";
		}
		public function morir(){
			echo "Ingerniero muere :'(";
		}
		public function reproducir(){
			echo "Ingerniero se reproduce";
		}
	}
?>