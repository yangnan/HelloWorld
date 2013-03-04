/*
 * jQuery Validator v0.7
 * http://code.google.com/p/jquery-validator/
 *
 * Copyright (c) 2009 Rafael Cesar
 * Licensed under the MIT license.
 * http://www.opensource.org/licenses/mit-license.php
 *
 * Date: 2009-01-14 15:55:00 -0300 (Tue, 14 Jan 2009)
 * Revision: 2
 */
(function($) {
	$.fn.validator = function(options) {
		
		options = options || {};//Este objeto guarda o ID da instancia para acess�-la depois
		
		//Gerando o ID da instancia
		var data = options['data'] = $.data(this[0]);
		
		
		$.validator[data] = new $.validator.init(this[0],options);
		return this;
	};
	$.extend($.expr[':'],{
		//Extens�o para o seletor da jQuery
		//assim fica mais facil de filtrar
		validable:function(elm) {
			return $(elm).is(':text,:password,:radio,:checkbox,:file,textarea,select');
		}
	});
	$.extend({
		validator: {
			/*
			options = {
				liveCallback:function(msg) {this == field},
				liveOnKeyUp:true,
				nocache:true,
				onFail:function(array) {},
				alert:true,
				onSuccess:function(element) {}
			}
			*/
			init:function(form,options) {
				//� obrigat�rio um objeto jQuery
				form = $(form);
				
				//Tornando as op��es p�blicas
				this.options = options;
				
				var v = $.validator,
					fields = v.parseFields($(':validable',form));//filtro e cache dos campos
				
				//Tornando os campos filtrados p�blicos
				this.options.fields = fields;
					
				//valida��o em tempo real dos campos
				if(options.liveCallback) {
					var tester, on;
					
					
					//fun��o de valida��o do evento
					//chamada com o campo inv�lido ou n�o
					on = function(evt) {
						
						$.validator[evt.data['data']]//Recuperando a instancia
						
						.options.liveCallback.apply($(this),tester(this));
						
					};
					
					
					//Valida��o no keyup n�o � muito aconselh�vel (desempenho)
					//A valida��o em 'tempo real' s� funciona no onblur ou no onkeyup,
					//mas somente em 1 deles
					
					
					//valida��es no onkeyup s� s�o feitas em 1 item da lista de valida��es (o primeiro encontrado) (desempenho)
					if(options.liveOnKeyUp) {
						tester = function(f) {
							return [v.tester(f,$.data(f,'names')[0])];
						};
						fields.bind('keyup',this.options,on);
					}
					
					//Valida��o padr�o para blur
					else {
						tester = function(f) {
							return $.map($.data(f,'names'),function(name) {
								return v.tester(f,name);
							});
						};
						fields.bind('blur',this.options,on);
					}
					
				}
				
				//Fun��o utilizada quando o usuario pretende 'submitar' o formulario
				//Extendo ela para o options.submit pois nem sempre ser� passado um formulario na init
				//INFO: Quando chamando a fun��o submit, VOC� DEVE ENVIAR O ID DA INSTANCIA
				//Assim: {data:'ID da instancia'}
				this.options.submit = function(evt) {
					
					var v = $.validator,
						data = evt.data && evt.data['data']?evt.data['data']:evt.data,
						obj = v[data],//Recuperando a instancia
						invalids,
						fields = obj.options.fields;
					
					//as vezes vc precisa re-cachear os campos
					if(obj.options.nocache === true)
						fields = obj.options.fields = v.parseFields($(':validable',form));
					
					//verificando os campos invalidos
					//Aqui � onde tudo acontece
					invalids = v.validation(fields);
					
					if(invalids.length) {//Quando existem campos inv�lidos
						
						//Retorno personalizado
						//� poss�vel retornar True e permitir o submit
						var _ret;
						
						//Fun��o para tratamento dos campos inv�lidos
						if(obj.options.onFail)
							_ret = obj.options.onFail(invalids);
						
						//alerta simples
						else if(obj.options.alert === true)
							alert($.map(invalids,function(a) {return a.join?a.join('\n'):a;}).join('\n'));
						
						return _ret || false;
					}
					
					//Fun��o personalizada quando os campos s�o v�lidos
					//� poss�vel retornar False e impedir o submit
					return options.onSuccess?
						options.onSuccess(form)
						:true;
				};
				//Caso o container seja um formulario
				//adiciono a valida��o no onsubmit
				if(form[0].tagName.toLowerCase() == 'form')
					form.bind('submit',this.options,this.options.submit);
			},
			//Retorna os campos que s�o poss�veis serem validados
			//(usado para cachear os campos que precisam de valida��o)
			parseFields:function(fields) {
				//Se passados os campos para verifica��o
				//� chamada a fun��o novamente para cada campo
				//passando somente um campo de cada vez
				if(fields.jquery)
					return fields.map($.validator.parseFields);
				
				//Quado passado apenas um campo
				//Retorna se o campo � ou n�o validavel
				//de acordo com os objetos de valida��o e sua classe
				else {
					var f = $(this),
						
						v = $.validator,
						
						//Fun��o que retorna apenas o nome dos objetos validadores
						//Pra facilitar e agilizar quando itero por eles
						nameOfValidators = function() {
							var ret = [];
							$.each($.validator.validators,function(a) {ret[ret.length] = a;});
							return ret;
						},
						
						//Fun��o para remover valores repetidos do array
						uniquier = function unique(array) {
							if(array.length < 2)
								return array;
							var unique = [],
								exist,i=0,j,len_i=array.length,len_j;
							for(;i<len_i;i++) {
								exist = false;
								len_j = unique.length;
								for(j=0;j<len_j;j++) {
									if(array[i] == unique[j]) {
										exist = true;
										break;
									}
								}
								if(!exist)
									unique[unique.length] = array[i];
							}
							return unique;
						},
						
						//objetos de valida��o
						validators = v.validators,
						
						
						fNames = $.merge(
							
							//O nome dos objetos que ser�o usados para validar o campo
							//ficam guardados num array no cache da jQuery
							//esse cache fica sempre relacionado ao campo
							($.data(this,'names') || []),
							
							//Passo por cada campo da lista de nomes
							$.map(nameOfValidators(),function(name) {
								
								//Se o nome estiver na classe do campo e
								//o campo estiver na lista de campos do objeto de valida��o
								//guardo o nome da valida��o
								if(f.hasClass(name) && f.is(validators[name]['fields']))
									return name;
								
							})
						);
					
					//No final eu guardo todos os nomes no cache do campo
					$.data(this,'names',fNames.length?uniquier(fNames):undefined);
					
					//Retorno NULL caso n�o seja poss�vel validar
					//Ou o campo, caso seja poss�vel valid�-lo
					return fNames.length?this:null;
				}
			},
			
			//valida��o dos campos
			validation:function(fields) {
				
				return fields.map(function() {
					
					var field = $(this),
					
						tester = $.validator.tester,
						
						//Passo por todos os nomes cacheados no campo e retorno se o mesmo est� valido ou n�o
						valid = $.map($.data(this,'names'),function(name) {
							return tester(field,name);
						});
					
					//Adiciono a propriedade field ao array
					//para acesso caso necess�rio
					valid['field'] = field;
					
					//Caso o campo seja inv�lido eu retorno o array com as mensagens
					//caso contr�rio eu retorno NULL
					return valid.length?valid:null;
				});
			},
			
			//Engine para uso dos validadores
			tester:function(field,vName) {
				
				//Pego o campo diretamente
				field = field['jquery']?field[0]:field;
				
				//Objeto-Validador
				var validator = $.validator.validators[vName];
				
				//Caso n�o seja valido
				//As mensagens sofrem um replace do caracter '%' pelo title do campo
				if(!validator.test(field))
					return validator.msg.indexOf('%')!=-1?validator.msg.replace('%','\'' + field.title + '\''):validator.msg;
					
				//Os v�lidos retornam NULL
				else
					return null;
			},
			
			//Validadores....
			//Podem ser extendidos
			validators:{
				
				//Exemplo
				
				//O nome do Objeto � o nome da classe a ser adicionada na tag
				'jLetter':{
					
					//Fun��o que testa o campo
					//O campo passado n�o pode estar num objeto jQuery
					//Retornar TRUE para campos v�lidos e FALSE para inv�lidos
					test:function(f) {
						return (/^[A-Za-z����������������������������������������������]+/i.test(f.value));
					},
					
					//Mensagem padr�o da valida��o
					//O sinal de '%'(porcentagem) ser� substituido pelo title do campo
					msg:'O campo % s� deve conter letras.',
					
					//Este � o tipo dos campos � que esse validador se aplica
					fields:':text,textarea,:password'//string compat�vel com a fun��o 'is' da jquery
				},
				
				'jEmpty':{
					test:function(f) {
						return !(/^\s*$/i.test(f.value));
					},
					msg:'O campo % deve ser preenchido.',
					fields:':text,textarea,:password,:file'
				},
				'jNumber':{
					test:function(f) {
						return (/^[0-9]+/i.test(f.value));
					},
					msg:'O campo % s� deve conter n�meros.',
					fields:'text,textarea,:password'
				},
				'jAlpha':{
					test:function(f) {
						return (/^[0-9A-Za-z����������������������������������������������]+/i.test(f.value));
					},
					msg:'O campo % s� deve conter caracteres alfanum�ricos',
					fields:':text,textarea,:password'
				},
				'jEmail':{
					test:function(f) {
						return (/^[a-zA-Z0-9_.+-]{2,}@([a-zA-Z0-9-]{2,}.)+[a-zA-Z0-9]{2,4}$/i.test(f.value));
					},
					msg:'O campo % deve possuir um e-mail v�lido.',
					fields:':text,textarea'
				},
				'jCpf':{
					test:function(f) {
						var str = f.value;
						str = str.replace(/[\.-]/g,'');
						if(str.length != 11 || (str.charAt(10) == str.charAt(9) && str.charAt(8) == str.charAt(10)) || str == '12345678909')
							return false;
						str = str.split('');
						var m = 0;
						do {
							for(var i=10+m,d=0;i>1;i--)
								d += str[(10+m)-i] * i;
							if((d%11<2?0:11-(d%11)) != str[str.length-(2-m)])
								return false;
							m++;
						}while(m<2);
						return true;
					},
					msg:'O campo % deve possuir um CPF v�lido.',
					fields:':text,textarea'
				},
				'jCnpj':{
					test:function(f) {
						var str = f.value;
						str = str.replace(/[\.\/-]/g,'');
						if(cnpj.length != 14)
							return false;
						cnpj = cnpj.split('');
						var m=0;
						do {
							for(var i=0,j=5+m,d=0;i<cnpj.length-(2-m);i++,j--) {
								if(j<2)j=9;
								d += cnpj[i] * j;
							}
							if((d%11<2?0:11-(d%11)) != cnpj[cnpj.length-(2-m)])
								return false;
							m++;
						}while(m<2);
						return true;
					},
					msg:'O campo % deve possuir um CNPJ v�lido.',
					fields:':text,textarea'
				},
				'jEq':{
					test:function(f) {//Id == Id2
						var f2 = $('#' + f.id.substr(0,f.id.length-1))[0];
						if(f.value != f2.value) {
							this.msg += f2.title;
							return false;
						}
						else
							return true;
					},
					msg:'O campo % deve ser igual ao campo ',
					fields:':text,:password'
				},
				'jReq':{
					test:function(f) {
						switch(f.type) {
							case 'text':
							case 'textarea':
							case 'file':
							case 'password':
								return $.validator.validators['jEmpty'].test(f);
								break;
							case 'checkbox':
								return f.checked;
								break;
							case 'select-one':
								return !(f.options.selectedIndex < $.validator['select']?1:0);
								break;
							case 'select-multiple':
								return !(f.options.selectedIndex < 0);
								break;
							case 'radio':
								return $('input[name="' + f.name + '"]:checked').length;
								break;
						}
					},
					msg:'O campo % � obrigat�rio',
					fields:'*'
				}
			}
		}
	});
})(jQuery);