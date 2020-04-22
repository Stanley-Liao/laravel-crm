<?php
namespace App\Interfaces;

interface Ihoroscope{

	public function name();

	public function entirety_desc();

	public function love_desc();

	public function career_desc();

	public function wealth_desc();

	public function entirety_rating();

	public function love_rating();

	public function career_rating();

	public function wealth_rating();
}