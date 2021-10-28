<?php

class Empleado
{

	private  $id_empleado;
	private  $fecha_ingreso;
	private  $fecha_liquidacion;
	private  $id_usuario;
	private $dias_vacaciones;

	public function getId_empleado()
	{
		return $this->id_empleado;
	}

	public function setId_empleado($id_empleado)
	{
		$this->id_empleado = $id_empleado;
	}

	public function getFecha_ingreso()
	{
		return $this->fecha_ingreso;
	}

	public function setFecha_ingreso($fecha_ingreso)
	{
		$this->fecha_ingreso = $fecha_ingreso;
	}

	public function getFecha_liquidacion()
	{
		return $this->fecha_liquidacion;
	}

	public function setFecha_liquidacion($fecha_liquidacion)
	{
		$this->fecha_liquidacion = $fecha_liquidacion;
	}


	public function getId_usuario(){
		return $this->id_usuario;
	}

	public function setId_usuario($id_usuario){
		$this->id_usuario = $id_usuario;
	}

	public function getDias_vacaciones()
	{
		return $this->dias_vacaciones;
	}

	public function setDias_vacaciones($dias_vacaciones)
	{
		$this->dias_vacaciones = $dias_vacaciones;
	}
}
