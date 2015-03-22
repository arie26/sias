<li>
	<a href="#" class="dropdown-toggle">
		<i class="icon-list"></i>
		<span class="menu-text"> Administrasi </span>

		<b class="arrow icon-angle-down"></b>
	</a>
	<ul class="submenu">
			<li><a href="<?php echo Yii::app()->request->baseUrl; ?>/guru/list"><i class='icon-double-angle-right'></i>Data Guru</a></li>
			<li><a href="<?php echo Yii::app()->request->baseUrl; ?>/siswa/list"><i class='icon-double-angle-right'></i>Data Siswa</a></li>
			<li><a href="<?php echo Yii::app()->request->baseUrl; ?>/mapel/list"><i class='icon-double-angle-right'></i>Data Mata Pelajaran</a></li>
			<li><a href="<?php echo Yii::app()->request->baseUrl; ?>/kelas/list"><i class='icon-double-angle-right'></i>Data Kelas</a></li>
			<li><a href="<?php echo Yii::app()->request->baseUrl; ?>/tahan/list"><i class='icon-double-angle-right'></i>Data Tahun Ajaran</a></li>
			<li><a href="<?php echo Yii::app()->request->baseUrl; ?>/semester/list"><i class='icon-double-angle-right'></i>Data Semester</a></li>
	</ul>
</li>
<li>
	<a href="#" class="dropdown-toggle">
		<i class="icon-tasks"></i>
		<span class="menu-text"> KBM </span>

		<b class="arrow icon-angle-down"></b>
	</a>
	<ul class="submenu">
			<li><a href="<?php echo Yii::app()->request->baseUrl; ?>/guru/list"><i class='icon-double-angle-right'></i>Penyusunan Jadwal</a></li>
			<li><a href="<?php echo Yii::app()->request->baseUrl; ?>/siswa/list"><i class='icon-double-angle-right'></i>Pembagaian Kelas</a></li>
	</ul>
</li>