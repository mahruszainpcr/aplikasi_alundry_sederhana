<?php  if ( ! defined("BASEPATH")) exit("No direct script access allowed");
	function generate_sidemenu()
	{
		return '
		<li>
		<a href="'.site_url('home').'"><i class="fa fa-print fa-fw"></i> Laporan Transaksi</a>
	</li>
		<li>
		<a href="'.site_url('Pelanggan').'"><i class="fa fa-user fa-fw"></i> Pelanggan</a>
	</li><li>
		<a href="'.site_url('transaksi_pencucian').'"><i class="fa fa-money fa-fw"></i> Transaksi pencucian</a>
	</li>
	<li>
		<a href="'.site_url('angka').'"><i class="fa fa-list fa-fw"></i> Angka</a>
	</li>';
	}
