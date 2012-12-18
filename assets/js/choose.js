
			$("#class_management").ready(function(){

				function optionload(){
					$( "#selector option:selected" ).each( function( ){
						//First we clear everything else it will generate more textboxes.
						$( "#selectboxes" ).empty( );

						//Then we extract the id attribute of the element.
						switch( $(this).attr( "id" ) ){
							case "option1":
								console.log( "option1" );
								//Construct an input element and prepend it to the div element
								$( "#selectboxes" )
									.append( $("<select name='subject[]'><option value='blaaah'>subject 1</option></select>"));
								$( "#selectboxes" )
									.append( $("<select name='teacher[]' style='margin-left:20px'><option value='blaaah'>teacher 1</option></select>"));
								break;
							case "option2":
								console.log( "option2" );
								//Construct an input element and prepend it to the div element
								$( "#selectboxes" )
									.prepend( $("<select name='teacher[]' style='margin-left:20px'><option value='blaaah'>teacher1</option></select>"));
								$( "#selectboxes" )
									.prepend( $("<br><select name='subject[]' ><option value='blaaah'>subject1</option></select>"));
								$( "#selectboxes" )
									.prepend( $("<select name='teacher[]' style='margin-left:20px'><option value='blaaah'>teacher2</option></select>"));
								$( "#selectboxes" )
									.prepend( $("<select name='subject[]' ><option value='blaaah'>subject2</option></select>"));
								break;
							case "option3":
								console.log( "option3" );
								//Construct an input element and prepend it to the div element
								$( "#selectboxes" )
									.prepend( $("<select name='teacher[]' style='margin-left:20px;'><option value='blaaah'>BLAAAH</option></select>"));
								$( "#selectboxes" )
									.prepend( $("<br><select name='subject[]' ><option value='blaaah'>BLAAAH</option></select>"));
								$( "#selectboxes" )
									.prepend( $("<select name='teacher[]' style='margin-left:20px;'><option value='blaaah'>BLAAAH</option></select>"));
								$( "#selectboxes" )
									.prepend( $("<br><select name='subject[]' ><option value='blaaah'>BLAAAH</option></select>"));
								$( "#selectboxes" )
									.prepend( $("<select name='teacher[]' style='margin-left:20px;'><option value='blaaah'>BLAAAH</option></select>"));
								$( "#selectboxes" )
									.prepend( $("<select name='subject[]' ><option value='blaaah'>BLAAAH</option></select>"));
								break;
							case "option4":
								console.log( "option4" );
								//Construct an input element and prepend it to the div element
								$( "#selectboxes" )
									.prepend( $("<select name='teacher[]' style='margin-left:20px;'><option value='blaaah'>BLAAAH</option></select>"));
								$( "#selectboxes" )
									.prepend( $("<br><select name='subject[]' ><option value='blaaah'>BLAAAH</option></select>"));
								$( "#selectboxes" )
									.prepend( $("<select name='teacher[]' style='margin-left:20px;'><option value='blaaah'>BLAAAH</option></select>"));
								$( "#selectboxes" )
									.prepend( $("<br><select name='subject[]' ><option value='blaaah'>BLAAAH</option></select>"));
								$( "#selectboxes" )
									.prepend( $("<select name='teacher[]' style='margin-left:20px;'><option value='blaaah'>BLAAAH</option></select>"));
								$( "#selectboxes" )
									.prepend( $("<br><select name='subject[]' ><option value='blaaah'>BLAAAH</option></select>"));
								$( "#selectboxes" )
									.prepend( $("<select name='teacher[]' style='margin-left:20px;'><option value='blaaah'>BLAAAH</option></select>"));
								$( "#selectboxes" )
									.prepend( $("<br><select name='subject[]' ><option value='blaaah'>BLAAAH</option></select>"));
								break;
							case "option5":
								console.log( "option5" );
								//Construct an input element and prepend it to the div element
								$( "#selectboxes" )
									.prepend( $("<select name='teacher[]' style='margin-left:20px;'><option value='blaaah'>BLAAAH</option></select>"));
								$( "#selectboxes" )
									.prepend( $("<br><select name='subject[]' ><option value='blaaah'>BLAAAH</option></select>"));
								$( "#selectboxes" )
									.prepend( $("<select name='teacher[]' style='margin-left:20px;'><option value='blaaah'>BLAAAH</option></select>"));
								$( "#selectboxes" )
									.prepend( $("<br><select name='subject[]' ><option value='blaaah'>BLAAAH</option></select>"));
								$( "#selectboxes" )
									.prepend( $("<select name='teacher[]' style='margin-left:20px;'><option value='blaaah'>BLAAAH</option></select>"));
								$( "#selectboxes" )
									.prepend( $("<br><select name='subject[]' ><option value='blaaah'>BLAAAH</option></select>"));
								$( "#selectboxes" )
									.prepend( $("<select name='teacher[]' style='margin-left:20px;'><option value='blaaah'>BLAAAH</option></select>"));
								$( "#selectboxes" )
									.prepend( $("<br><select name='subject[]' ><option value='blaaah'>BLAAAH</option></select>"));
								$( "#selectboxes" )
									.prepend( $("<select name='teacher[]' style='margin-left:20px;'><option value='blaaah'>BLAAAH</option></select>"));
								$( "#selectboxes" )
									.prepend( $("<br><select name='subject[]' ><option value='blaaah'>BLAAAH</option></select>"));
								break;
							case "option6":
								console.log( "option6" );
								//Construct an input element and prepend it to the div element
								$( "#selectboxes" )
									.prepend( $("<select name='teacher[]' style='margin-left:20px;'><option value='blaaah'>BLAAAH</option></select>"));
								$( "#selectboxes" )
									.prepend( $("<br><select name='subject[]' ><option value='blaaah'>BLAAAH</option></select>"));
								$( "#selectboxes" )
									.prepend( $("<select name='teacher[]' style='margin-left:20px;'><option value='blaaah'>BLAAAH</option></select>"));
								$( "#selectboxes" )
									.prepend( $("<br><select name='subject[]' ><option value='blaaah'>BLAAAH</option></select>"));
								$( "#selectboxes" )
									.prepend( $("<select name='teacher[]' style='margin-left:20px;'><option value='blaaah'>BLAAAH</option></select>"));
								$( "#selectboxes" )
									.prepend( $("<br><select name='subject[]' ><option value='blaaah'>BLAAAH</option></select>"));
								$( "#selectboxes" )
									.prepend( $("<select name='teacher[]' style='margin-left:20px;'><option value='blaaah'>BLAAAH</option></select>"));
								$( "#selectboxes" )
									.prepend( $("<br><select name='subject[]' ><option value='blaaah'>BLAAAH</option></select>"));
								$( "#selectboxes" )
									.prepend( $("<select name='teacher[]' style='margin-left:20px;'><option value='blaaah'>BLAAAH</option></select>"));
								$( "#selectboxes" )
									.prepend( $("<br><select name='subject[]' ><option value='blaaah'>BLAAAH</option></select>"));
								$( "#selectboxes" )
									.prepend( $("<select name='teacher[]' style='margin-left:20px;'><option value='blaaah'>BLAAAH</option></select>"));
								$( "#selectboxes" )
									.prepend( $("<br><select name='subject[]' ><option value='blaaah'>BLAAAH</option></select>"));
								break;
							case "option7":
								console.log( "option7" );
								//Construct an input element and prepend it to the div element
								$( "#selectboxes" )
									.prepend( $("<select name='teacher[]' style='margin-left:20px;'><option value='blaaah'>BLAAAH</option></select>"));
								$( "#selectboxes" )
									.prepend( $("<br><select name='subject[]' ><option value='blaaah'>BLAAAH</option></select>"));
								$( "#selectboxes" )
									.prepend( $("<select name='teacher[]' style='margin-left:20px;'><option value='blaaah'>BLAAAH</option></select>"));
								$( "#selectboxes" )
									.prepend( $("<br><select name='subject[]' ><option value='blaaah'>BLAAAH</option></select>"));
								$( "#selectboxes" )
									.prepend( $("<select name='teacher[]' style='margin-left:20px;'><option value='blaaah'>BLAAAH</option></select>"));
								$( "#selectboxes" )
									.prepend( $("<br><select name='subject[]' ><option value='blaaah'>BLAAAH</option></select>"));
								$( "#selectboxes" )
									.prepend( $("<select name='teacher[]' style='margin-left:20px;'><option value='blaaah'>BLAAAH</option></select>"));
								$( "#selectboxes" )
									.prepend( $("<br><select name='subject[]' ><option value='blaaah'>BLAAAH</option></select>"));
								$( "#selectboxes" )
									.prepend( $("<select name='teacher[]' style='margin-left:20px;'><option value='blaaah'>BLAAAH</option></select>"));
								$( "#selectboxes" )
									.prepend( $("<br><select name='subject[]' ><option value='blaaah'>BLAAAH</option></select>"));
								$( "#selectboxes" )
									.prepend( $("<select name='teacher[]' style='margin-left:20px;'><option value='blaaah'>BLAAAH</option></select>"));
								$( "#selectboxes" )
									.prepend( $("<br><select name='subject[]' ><option value='blaaah'>BLAAAH</option></select>"));
								$( "#selectboxes" )
									.prepend( $("<select name='teacher[]' style='margin-left:20px;'><option value='blaaah'>BLAAAH</option></select>"));
								$( "#selectboxes" )
									.prepend( $("<br><select name='subject[]' ><option value='blaaah'>BLAAAH</option></select>"));
								break;
							case "option8":
								console.log( "option2" );
								//Construct an input element and prepend it to the div element
								$( "#selectboxes" )
									.prepend( $("<select name='teacher[]' style='margin-left:20px;'><option value='blaaah'>BLAAAH</option></select>"));
								$( "#selectboxes" )
									.prepend( $("<br><select name='subject[]' ><option value='blaaah'>BLAAAH</option></select>"));
								$( "#selectboxes" )
									.prepend( $("<select name='teacher[]' style='margin-left:20px;'><option value='blaaah'>BLAAAH</option></select>"));
								$( "#selectboxes" )
									.prepend( $("<br><select name='subject[]' ><option value='blaaah'>BLAAAH</option></select>"));
								$( "#selectboxes" )
									.prepend( $("<select name='teacher[]' style='margin-left:20px;'><option value='blaaah'>BLAAAH</option></select>"));
								$( "#selectboxes" )
									.prepend( $("<br><select name='subject[]' ><option value='blaaah'>BLAAAH</option></select>"));
								$( "#selectboxes" )
									.prepend( $("<select name='teacher[]' style='margin-left:20px;'><option value='blaaah'>BLAAAH</option></select>"));
								$( "#selectboxes" )
									.prepend( $("<br><select name='subject[]' ><option value='blaaah'>BLAAAH</option></select>"));
								$( "#selectboxes" )
									.prepend( $("<select name='teacher[]' style='margin-left:20px;'><option value='blaaah'>BLAAAH</option></select>"));
								$( "#selectboxes" )
									.prepend( $("<br><select name='subject[]' ><option value='blaaah'>BLAAAH</option></select>"));
								$( "#selectboxes" )
									.prepend( $("<select name='teacher[]' style='margin-left:20px;'><option value='blaaah'>BLAAAH</option></select>"));
								$( "#selectboxes" )
									.prepend( $("<br><select name='subject[]' ><option value='blaaah'>BLAAAH</option></select>"));
								$( "#selectboxes" )
									.prepend( $("<select name='teacher[]' style='margin-left:20px;'><option value='blaaah'>BLAAAH</option></select>"));
								$( "#selectboxes" )
									.prepend( $("<br><select name='subject[]' ><option value='blaaah'>BLAAAH</option></select>"));
								$( "#selectboxes" )
									.prepend( $("<select name='teacher[]' style='margin-left:20px;'><option value='blaaah'>BLAAAH</option></select>"));
								$( "#selectboxes" )
									.prepend( $("<br><select name='subject[]' ><option value='blaaah'>BLAAAH</option></select>"));
								break;
							case "option9":
								console.log( "option9" );
								//Construct an input element and prepend it to the div element
								$( "#selectboxes" )
									.prepend( $("<select name='teacher[]' style='margin-left:20px;'><option value='blaaah'>BLAAAH</option></select>"));
								$( "#selectboxes" )
									.prepend( $("<br><select name='subject[]' ><option value='blaaah'>BLAAAH</option></select>"));
								$( "#selectboxes")
									.prepend( $("<select name='teacher[]' style='margin-left:20px;'><option value='blaaah'>BLAAAH</option></select>"));
								$( "#selectboxes" )
									.prepend( $("<br><select name='subject[]' ><option value='blaaah'>BLAAAH</option></select>"));
								$( "#selectboxes" )
									.prepend( $("<select name='teacher[]' style='margin-left:20px;'><option value='blaaah'>BLAAAH</option></select>"));
								$( "#selectboxes" )
									.prepend( $("<br><select name='subject[]' ><option value='blaaah'>BLAAAH</option></select>"));
								$( "#selectboxes" )
									.prepend( $("<select name='teacher[]' style='margin-left:20px;'><option value='blaaah'>BLAAAH</option></select>"));
								$( "#selectboxes" )
									.prepend( $("<br><select name='subject[]' ><option value='blaaah'>BLAAAH</option></select>"));
								$( "#selectboxes" )
									.prepend( $("<select name='teacher[]' style='margin-left:20px;'><option value='blaaah'>BLAAAH</option></select>"));
								$( "#selectboxes" )
									.prepend( $("<br><select name='subject[]' ><option value='blaaah'>BLAAAH</option></select>"));
								$( "#selectboxes" )
									.prepend( $("<select name='teacher[]' style='margin-left:20px;'><option value='blaaah'>BLAAAH</option></select>"));
								$( "#selectboxes" )
									.prepend( $("<br><select name='subject[]' ><option value='blaaah'>BLAAAH</option></select>"));
								$( "#selectboxes" )
									.prepend( $("<select name='teacher[]' style='margin-left:20px;'><option value='blaaah'>BLAAAH</option></select>"));
								$( "#selectboxes" )
									.prepend( $("<br><select name='subject[]' ><option value='blaaah'>BLAAAH</option></select>"));
								$( "#selectboxes" )
									.prepend( $("<select name='teacher[]' style='margin-left:20px;'><option value='blaaah'>BLAAAH</option></select>"));
								$( "#selectboxes" )
									.prepend( $("<br><select name='subject[]' ><option value='blaaah'>BLAAAH</option></select>"));
								$( "#selectboxes" )
									.prepend( $("<select name='teacher[]' style='margin-left:20px;'><option value='blaaah'>BLAAAH</option></select>"));
								$( "#selectboxes" )
									.prepend( $("<br><select name='subject[]' ><option value='blaaah'>BLAAAH</option></select>"));
								break;

							
						}
					} );
				}
				$( "#selector" ).change( function( ){
					//This will be called everytime the select option is changed.
					optionload( );
				} );
				$( "#selector" ).ready( function( ){
					//This will be called when the element is loaded.
					optionload( );
				} );
			});

