<?php namespace App\Http\Controllers;

	use Session;
	use Request;
	use DB;
	use CRUDBooster;

	class AdminAlumnosController extends \crocodicstudio\crudbooster\controllers\CBController {

	    public function cbInit() {

			# START CONFIGURATION DO NOT REMOVE THIS LINE
			$this->title_field = "nombre";
			$this->limit = "20";
			$this->orderby = "apellido,asc";
			$this->global_privilege = false;
			$this->button_table_action = true;
			$this->button_bulk_action = true;
			$this->button_action_style = "button_icon";
			$this->button_add = true;
			$this->button_edit = true;
			$this->button_delete = true;
			$this->button_detail = true;
			$this->button_show = true;
			$this->button_filter = true;
			$this->button_import = false;
			$this->button_export = true;
			$this->table = "alumnos";
			# END CONFIGURATION DO NOT REMOVE THIS LINE

			# START COLUMNS DO NOT REMOVE THIS LINE
			$this->col = [];
			$this->col[] = ["label"=>"Apellido","name"=>"apellido"];
			$this->col[] = ["label"=>"Nombre","name"=>"nombre"];
			$this->col[] = ["label"=>"Telefono","name"=>"telefono"];
			$this->col[] = ["label"=>"Mail","name"=>"mail"];
			$this->col[] = ["label"=>"Inscripto A","name"=>"actividad_id","join"=>"actividades,nombre"];
			# END COLUMNS DO NOT REMOVE THIS LINE

			# START FORM DO NOT REMOVE THIS LINE
			$this->form = [];
			$this->form[] = ['label'=>'Detalles Personales','name'=>'header','type'=>'header','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Nombre','name'=>'nombre','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Apellido','name'=>'apellido','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Actividad Académica','name'=>'actividad_id','type'=>'select2','validation'=>'integer|min:0','width'=>'col-sm-10','datatable'=>'actividades,nombre'];
			$this->form[] = ['label'=>'Telefono','name'=>'telefono','type'=>'text','validation'=>'min:1|max:255','width'=>'col-sm-10','placeholder'=>'Introduce una dirección de correo electrónico válida'];
			$this->form[] = ['label'=>'Mail','name'=>'mail','type'=>'email','validation'=>'min:1|max:255|email','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'DNI','name'=>'DNI','type'=>'text','validation'=>'required','width'=>'col-sm-9'];
			$this->form[] = ['label'=>'Domicilio','name'=>'Domicilio','type'=>'text','validation'=>'required','width'=>'col-sm-9'];
			$this->form[] = ['label'=>'Ciudad','name'=>'ciudad','type'=>'text','validation'=>'min:1|max:255','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Detalles Administrativos','name'=>'header','type'=>'header','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Condicion','name'=>'condicion','type'=>'radio','validation'=>'min:1|max:255','width'=>'col-sm-10','dataenum'=>'SOCIO;NO SOCIO'];
			$this->form[] = ['label'=>'Titulo Profesional','name'=>'titulo_profesional','type'=>'text','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Localidad Convenio','name'=>'localidad_convenio','type'=>'text','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Numero Matricula','name'=>'numero_matricula','type'=>'text','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Presento Tif','name'=>'presento_tif','type'=>'radio','validation'=>'min:1|max:255','width'=>'col-sm-10','dataenum'=>'SI;NO'];
			$this->form[] = ['label'=>'Observaciones','name'=>'header','type'=>'header','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Observaciones','name'=>'observaciones','type'=>'textarea','width'=>'col-sm-10'];
			# END FORM DO NOT REMOVE THIS LINE

			# OLD START FORM
			//$this->form = [];
			//$this->form[] = ['label'=>'Detalles Personales','name'=>'header','type'=>'header','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Nombre','name'=>'nombre','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Apellido','name'=>'apellido','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Actividad Académica','name'=>'actividad_id','type'=>'select2','validation'=>'integer|min:0','width'=>'col-sm-10','datatable'=>'actividades,nombre'];
			//$this->form[] = ['label'=>'Telefono','name'=>'telefono','type'=>'text','validation'=>'min:1|max:255','width'=>'col-sm-10','placeholder'=>'Introduce una dirección de correo electrónico válida'];
			//$this->form[] = ['label'=>'Mail','name'=>'mail','type'=>'email','validation'=>'min:1|max:255|email|unique:alumnos','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'DNI','name'=>'DNI','type'=>'text','validation'=>'required','width'=>'col-sm-9'];
			//$this->form[] = ['label'=>'Domicilio','name'=>'Domicilio','type'=>'text','validation'=>'required','width'=>'col-sm-9'];
			//$this->form[] = ['label'=>'Ciudad','name'=>'ciudad','type'=>'text','validation'=>'min:1|max:255','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Detalles Administrativos','name'=>'header','type'=>'header','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Condicion','name'=>'condicion','type'=>'radio','validation'=>'min:1|max:255','width'=>'col-sm-10','dataenum'=>'SOCIO;NO SOCIO'];
			//$this->form[] = ['label'=>'Titulo Profesional','name'=>'titulo_profesional','type'=>'text','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Localidad Convenio','name'=>'localidad_convenio','type'=>'text','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Numero Matricula','name'=>'numero_matricula','type'=>'text','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Presento Tif','name'=>'presento_tif','type'=>'radio','validation'=>'min:1|max:255','width'=>'col-sm-10','dataenum'=>'SI;NO'];
			//$this->form[] = ['label'=>'Observaciones','name'=>'header','type'=>'header','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Observaciones','name'=>'observaciones','type'=>'textarea','width'=>'col-sm-10'];
			# OLD END FORM

			/* 
	        | ---------------------------------------------------------------------- 
	        | Sub Module
	        | ----------------------------------------------------------------------     
			| @label          = Label of action 
			| @path           = Path of sub module
			| @foreign_key 	  = foreign key of sub table/module
			| @button_color   = Bootstrap Class (primary,success,warning,danger)
			| @button_icon    = Font Awesome Class  
			| @parent_columns = Sparate with comma, e.g : name,created_at
	        | 
	        
			$this->sub_module = array();*/
			if (CRUDBooster::myPrivilegeName() !== 'Tesoreria'){
				$this->sub_module[] = ['label'=>'Gestionar Asistencia','path'=>'asistencias','parent_columns'=>'nombre','parent_columns_alias'=>'Gestionando asistencias de alumno','foreign_key'=>'alumno_id','button_color'=>'success','button_icon'=>'fa fa-bars'];
			}
			
			if (CRUDBooster::myPrivilegeName() == 'Tesoreria'){
				$this->sub_module[] = ['label'=>'Lista de Pagos','path'=>'pagos','parent_columns'=>'nombre','parent_columns_alias'=>'Listando pagos de alumno','foreign_key'=>'alumno_id','button_color'=>'success','button_icon'=>'fa fa-bars'];
			}


	        /* 
	        | ---------------------------------------------------------------------- 
	        | Add More Action Button / Menu
	        | ----------------------------------------------------------------------     
	        | @label       = Label of action 
	        | @url         = Target URL, you can use field alias. e.g : [id], [name], [title], etc
	        | @icon        = Font awesome class icon. e.g : fa fa-bars
	        | @color 	   = Default is primary. (primary, warning, succecss, info)     
	        | @showIf 	   = If condition when action show. Use field alias. e.g : [id] == 1
	        | 
	        */
	        $this->addaction = array();


	        /* 
	        | ---------------------------------------------------------------------- 
	        | Add More Button Selected
	        | ----------------------------------------------------------------------     
	        | @label       = Label of action 
	        | @icon 	   = Icon from fontawesome
	        | @name 	   = Name of button 
	        | Then about the action, you should code at actionButtonSelected method 
	        | 
	        */
	        $this->button_selected = array();

	                
	        /* 
	        | ---------------------------------------------------------------------- 
	        | Add alert message to this module at overheader
	        | ----------------------------------------------------------------------     
	        | @message = Text of message 
	        | @type    = warning,success,danger,info        
	        | 
	        */
	        $this->alert        = array();
	                

	        
	        /* 
	        | ---------------------------------------------------------------------- 
	        | Add more button to header button 
	        | ----------------------------------------------------------------------     
	        | @label = Name of button 
	        | @url   = URL Target
	        | @icon  = Icon from Awesome.
	        | 
	        */
	        $this->index_button = array();



	        /* 
	        | ---------------------------------------------------------------------- 
	        | Customize Table Row Color
	        | ----------------------------------------------------------------------     
	        | @condition = If condition. You may use field alias. E.g : [id] == 1
	        | @color = Default is none. You can use bootstrap success,info,warning,danger,primary.        
	        | 
	        */
	        $this->table_row_color = array();     	          

	        
	        /*
	        | ---------------------------------------------------------------------- 
	        | You may use this bellow array to add statistic at dashboard 
	        | ---------------------------------------------------------------------- 
	        | @label, @count, @icon, @color 
	        |
	        */
			$this->index_statistic = array();
			
			if(Request::get('parent_id')){
				$parent = Request::get('parent_id');
				$this->index_statistic[] = ['label'=>'Total de Alumnos del curso','count'=>DB::table('alumnos')->where('actividad_id', $parent)->count(),'icon'=>'fa fa-check','color'=>'success'];
			}



	        /*
	        | ---------------------------------------------------------------------- 
	        | Add javascript at body 
	        | ---------------------------------------------------------------------- 
	        | javascript code in the variable 
	        | $this->script_js = "function() { ... }";
	        |
	        */
	        $this->script_js = NULL;


            /*
	        | ---------------------------------------------------------------------- 
	        | Include HTML Code before index table 
	        | ---------------------------------------------------------------------- 
	        | html code to display it before index table
	        | $this->pre_index_html = "<p>test</p>";
	        |
	        */
	        $this->pre_index_html = null;
	        
	        
	        
	        /*
	        | ---------------------------------------------------------------------- 
	        | Include HTML Code after index table 
	        | ---------------------------------------------------------------------- 
	        | html code to display it after index table
	        | $this->post_index_html = "<p>test</p>";
	        |
	        */
	        $this->post_index_html = null;
	        
	        
	        
	        /*
	        | ---------------------------------------------------------------------- 
	        | Include Javascript File 
	        | ---------------------------------------------------------------------- 
	        | URL of your javascript each array 
	        | $this->load_js[] = asset("myfile.js");
	        |
	        */
	        $this->load_js = array();
	        
	        
	        
	        /*
	        | ---------------------------------------------------------------------- 
	        | Add css style at body 
	        | ---------------------------------------------------------------------- 
	        | css code in the variable 
	        | $this->style_css = ".style{....}";
	        |
	        */
	        $this->style_css = NULL;
	        
	        
	        
	        /*
	        | ---------------------------------------------------------------------- 
	        | Include css File 
	        | ---------------------------------------------------------------------- 
	        | URL of your css each array 
	        | $this->load_css[] = asset("myfile.css");
	        |
	        */
	        $this->load_css = array();
	        
	        
	    }


	    /*
	    | ---------------------------------------------------------------------- 
	    | Hook for button selected
	    | ---------------------------------------------------------------------- 
	    | @id_selected = the id selected
	    | @button_name = the name of button
	    |
	    */
	    public function actionButtonSelected($id_selected,$button_name) {
	        //Your code here
	            
	    }


	    /*
	    | ---------------------------------------------------------------------- 
	    | Hook for manipulate query of index result 
	    | ---------------------------------------------------------------------- 
	    | @query = current sql query 
	    |
	    */
	    public function hook_query_index(&$query) {
	        //Your code here
			if (CRUDBooster::myPrivilegeName() == 'Capacitador' ){
				$id = CRUDBooster::myId();
				$idCurso = DB::table('cms_users')->where('id', $id)->pluck('actividad_id');
				$query->where('actividad_id',$idCurso);


			}    
	    }

	    /*
	    | ---------------------------------------------------------------------- 
	    | Hook for manipulate row of index table html 
	    | ---------------------------------------------------------------------- 
	    |
	    */    
	    public function hook_row_index($column_index,&$column_value) {	        
	    	//Your code here
	    }

	    /*
	    | ---------------------------------------------------------------------- 
	    | Hook for manipulate data input before add data is execute
	    | ---------------------------------------------------------------------- 
	    | @arr
	    |
	    */
	    public function hook_before_add(&$postdata) {        
	        //Your code here

	    }

	    /* 
	    | ---------------------------------------------------------------------- 
	    | Hook for execute command after add public static function called 
	    | ---------------------------------------------------------------------- 
	    | @id = last insert id
	    | 
	    */
	    public function hook_after_add($id) {
		 
			
			$idCurso = DB::table('alumnos')->where('id', $id)->pluck('actividad_id');
			$clases = DB::table('clases')->where('actividad_id',$idCurso)->get();
		
			foreach ($clases as $clase){
			  DB::table('asistencias')->insertGetId(
				array('alumno_id' => $id, 'clase_id' => $clase->id, 'asistio'=> "SIN DEFINIR")
			);
			}

	    }

	    /* 
	    | ---------------------------------------------------------------------- 
	    | Hook for manipulate data input before update data is execute
	    | ---------------------------------------------------------------------- 
	    | @postdata = input post data 
	    | @id       = current id 
	    | 
	    */
	    public function hook_before_edit(&$postdata,$id) {        
	        //Your code here

	    }

	    /* 
	    | ---------------------------------------------------------------------- 
	    | Hook for execute command after edit public static function called
	    | ----------------------------------------------------------------------     
	    | @id       = current id 
	    | 
	    */
	    public function hook_after_edit($id) {
	        //Your code here 

	    }

	    /* 
	    | ---------------------------------------------------------------------- 
	    | Hook for execute command before delete public static function called
	    | ----------------------------------------------------------------------     
	    | @id       = current id 
	    | 
	    */
	    public function hook_before_delete($id) {
	        //Your code here

	    }

	    /* 
	    | ---------------------------------------------------------------------- 
	    | Hook for execute command after delete public static function called
	    | ----------------------------------------------------------------------     
	    | @id       = current id 
	    | 
	    */
	    public function hook_after_delete($id) {
	        //Your code here

	    }



	    //By the way, you can still create your own method in here... :) 


	}