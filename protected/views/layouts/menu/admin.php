<li 
	<?php if (Yii::app()->getController()->getAction()->controller->id == 'guru' || Yii::app()->getController()->getAction()->controller->id == 'siswa' 
			|| Yii::app()->getController()->getAction()->controller->id == 'mapel' || Yii::app()->getController()->getAction()->controller->id == 'kelas' 
			|| Yii::app()->getController()->getAction()->controller->id == 'tahan' || Yii::app()->getController()->getAction()->controller->id == 'semester'){
		echo "class='active open'";
	}  ?> >
	<a href="#" class="dropdown-toggle">
		<i class="icon-list"></i>
		<span class="menu-text"> Administrasi </span>

		<b class="arrow icon-angle-down"></b>
	</a>
	<ul class="submenu">
			<li <?php if (Yii::app()->getController()->getAction()->controller->id == 'guru'){ echo "class='active'"; }?> > 
				<a href="<?php echo Yii::app()->request->baseUrl; ?>/guru/list"><i class='icon-double-angle-right'></i>Data Guru</a>
			</li>
			<li  <?php if (Yii::app()->getController()->getAction()->controller->id == 'siswa'){ echo "class='active'"; }?> >
				<a href="<?php echo Yii::app()->request->baseUrl; ?>/siswa/list"><i class='icon-double-angle-right'></i>Data Siswa</a>
			</li>
			<li <?php if (Yii::app()->getController()->getAction()->controller->id == 'mapel'){ echo "class='active'"; }?> >
				<a href="<?php echo Yii::app()->request->baseUrl; ?>/mapel/list"><i class='icon-double-angle-right'></i>Data Mata Pelajaran</a>
			</li>
			<li <?php if (Yii::app()->getController()->getAction()->controller->id == 'kelas'){ echo "class='active'"; }?> >
				<a href="<?php echo Yii::app()->request->baseUrl; ?>/kelas/list"><i class='icon-double-angle-right'></i>Data Kelas</a>
			</li>
			<li <?php if (Yii::app()->getController()->getAction()->controller->id == 'tahan'){ echo "class='active'"; }?> >
				<a href="<?php echo Yii::app()->request->baseUrl; ?>/tahan/list"><i class='icon-double-angle-right'></i>Data Tahun Ajaran</a>
			</li>
			<li <?php if (Yii::app()->getController()->getAction()->controller->id == 'semester'){ echo "class='active'"; }?> >
				<a href="<?php echo Yii::app()->request->baseUrl; ?>/semester/list"><i class='icon-double-angle-right'></i>Data Semester</a>
			</li>
	</ul>
</li>
<li <?php if (Yii::app()->getController()->getAction()->controller->id == 'jadwal' || Yii::app()->getController()->getAction()->controller->id == 'bagkel'){
		echo "class='active open'";
	}  ?> >
	<a href="#" class="dropdown-toggle">
		<i class="icon-tasks"></i>
		<span class="menu-text"> KBM </span>

		<b class="arrow icon-angle-down"></b>
	</a>
	<ul class="submenu">
			<li <?php if (Yii::app()->getController()->getAction()->controller->id == 'jadwal'){ echo "class='active'"; }?> >
				<a href="<?php echo Yii::app()->request->baseUrl; ?>/jadwal/list"><i class='icon-double-angle-right'></i>Penyusunan Jadwal</a>
			</li>
			<li <?php if (Yii::app()->getController()->getAction()->controller->id == 'bagkel'){ echo "class='active'"; }?> >
				<a href="<?php echo Yii::app()->request->baseUrl; ?>/bagkel/list"><i class='icon-double-angle-right'></i>Pembagaian Kelas</a>
			</li>
	</ul>
</li>