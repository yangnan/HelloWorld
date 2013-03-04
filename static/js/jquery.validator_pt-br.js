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
		
		options = options || {};//Este objeto guarda o ID da instancia para acessá-la depois
		
		//Gerando o ID da instancia
		var data = options['data'] = $.data(this[0]);
		
		
		$.validator[data] = new $.validator.init(this[0],options);
		return this;
	};
	$.extend($.expr[':'],{
		//Extensão para o seletor da jQuery
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
				//É obrigatório um objeto jQuery
				form = $(form);
				
				//Tornando as opções públicas
				this.options = options;
				
				var v = $.validator,
					fields = v.parseFields($(':validable',form));//filtro e cache dos campos
				
				//Tornando os campos filtrados públicos
				this.options.fields = fields;
					
				//validação em tempo real dos campos
				if(options.liveCallback) {
					var tester, on;
					
					
					//função de validação do evento
					//chamada com o campo inválido ou não
					on = function(evt) {
						
						$.validator[evt.data['data']]//Recuperando a instancia
						
						.options.liveCallback.apply($(this),tester(this));
						
					};
					
					
					//Validação no keyup não é muito aconselhável (desempenho)
					//A validação em 'tempo real' só funciona no onblur ou no onkeyup,
					//mas somente em 1 deles
					
					
					//validações no onkeyup só são feitas em 1 item da lista de validações (o primeiro encontrado) (desempenho)
					if(options.liveOnKeyUp) {
						tester = function(f) {
							return [v.tester(f,$.data(f,'names')[0])];
						};
						fields.bind('keyup',this.options,on);
					}
					
					//Validação padrão para blur
					else {
						tester = function(f) {
							return $.map($.data(f,'names'),function(name) {
								return v.tester(f,name);
							});
						};
						fields.bind('blur',this.options,on);
					}
					
				}
				
				//Função utilizada quando o usuario pretende 'submitar' o formulario
				//Extendo ela para o options.submit pois nem sempre será passado um formulario na init
				//INFO: Quando chamando a função submit, VOCÊ DEVE ENVIAR O ID DA INSTANCIA
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
					//Aqui é onde tudo acontece
					invalids = v.validation(fields);
					
					if(invalids.length) {//Quando existem campos inválidos
						
						//Retorno personalizado
						//É possível retornar True e permitir o submit
						var _ret;
						
						//Função para tratamento dos campos inválidos
						if(obj.options.onFail)
							_ret = obj.options.onFail(invalids);
						
						//alerta simples
						else if(obj.options.alert === true)
							alert($.map(invalids,function(a) {return a.join?a.join('\n'):a;}).join('\n'));
						
						return _ret || false;
					}
					
					//Função personalizada quando os campos são válidos
					//É possível retornar False e impedir o submit
					return options.onSuccess?
						options.onSuccess(form)
						:true;
				};
				//Caso o container seja um formulario
				//adiciono a validação no onsubmit
				if(form[0].tagName.toLowerCase() == 'form')
					form.bind('submit',this.options,this.options.submit);
			},
			//Retorna os campos que são possíveis serem validados
			//(usado para cachear os campos que precisam de validação)
			parseFields:function(fields) {
				//Se passados os campos para verificação
				//É chamada a função novamente para cada campo
				//passando somente um campo de cada vez
				if(fields.jquery)
					return fields.map($.validator.parseFields);
				
				//Quado passado apenas um campo
				//Retorna se o campo é ou não validavel
				//de acordo com os objetos de validação e sua classe
				else {
					var f = $(this),
						
						v = $.validator,
						
						//Função que retorna apenas o nome dos objetos validadores
						//Pra facilitar e agilizar quando itero por eles
						nameOfValidators = function() {
							var ret = [];
							$.each($.validator.validators,function(a) {ret[ret.length] = a;});
							return ret;
						},
						
						//Função para remover valores repetidos do array
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
						
						//objetos de validação
						validators = v.validators,
						
						
						fNames = $.merge(
							
							//O nome dos objetos que serão usados para validar o campo
							//ficam guardados num array no cache da jQuery
							//esse cache fica sempre relacionado ao campo
							($.data(this,'names') || []),
							
							//Passo por cada campo da lista de nomes
							$.map(nameOfValidators(),function(name) {
								
								//Se o nome estiver na classe do campo e
								//o campo estiver na lista de campos do objeto de validação
								//guardo o nome da validação
								if(f.hasClass(name) && f.is(validators[name]['fields']))
									return name;
								
							})
						);
					
					//No final eu guardo todos os nomes no cache do campo
					$.data(this,'names',fNames.length?uniquier(fNames):undefined);
					
					//Retorno NULL caso não seja possível validar
					//Ou o campo, caso seja possível validá-lo
					return fNames.length?this:null;
				}
			},
			
			//validação dos campos
			validation:function(fields) {
				
				return fields.map(function() {
					
					var field = $(this),
					
						tester = $.validator.tester,
						
						//Passo por todos os nomes cacheados no campo e retorno se o mesmo está valido ou não
						valid = $.map($.data(this,'names'),function(name) {
							return tester(field,name);
						});
					
					//Adiciono a propriedade field ao array
					//para acesso caso necessário
					valid['field'] = field;
					
					//Caso o campo seja inválido eu retorno o array com as mensagens
					//caso contrário eu retorno NULL
					return valid.length?valid:null;
				});
			},
			
			//Engine para uso dos validadores
			tester:function(field,vName) {
				
				//Pego o campo diretamente
				field = field['jquery']?field[0]:field;
				
				//Objeto-Validador
				var validator = $.validator.validators[vName];
				
				//Caso não seja valido
				//As mensagens sofrem um replace do caracter '%' pelo title do campo
				if(!validator.test(field))
					return validator.msg.indexOf('%')!=-1?validator.msg.replace('%','\'' + field.title + '\''):validator.msg;
					
				//Os válidos retornam NULL
				else
					return null;
			},
			
			//Validadores....
			//Podem ser extendidos
			validators:{
				
				//Exemplo
				
				//O nome do Objeto é o nome da classe a ser adicionada na tag
				'jLetter':{
					
					//Função que testa o campo
					//O campo passado não pode estar num objeto jQuery
					//Retornar TRUE para campos válidos e FALSE para inválidos
					test:function(f) {
						return (/^[A-Za-záàãâäéèêëíìîïóòõôöúùûüçÁÀÃÂÄÉÈÊËÍÌÎÏÓÒÕÔÖÚÙÛÜÇ]+/i.test(f.value));
					},
					
					//Mensagem padrão da validação
					//O sinal de '%'(porcentagem) será substituido pelo title do campo
					msg:'O campo % só deve conter letras.',
					
					//Este é o tipo dos campos à que esse validador se aplica
					fields:':text,textarea,:password'//string compatível com a função 'is' da jquery
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
					msg:'O campo % só deve conter números.',
					fields:'text,textarea,:password'
				},
				'jAlpha':{
					test:function(f) {
						return (/^[0-9A-Za-záàãâäéèêëíìîïóòõôöúùûüçÁÀÃÂÄÉÈÊËÍÌÎÏÓÒÕÔÖÚÙÛÜÇ]+/i.test(f.value));
					},
					msg:'O campo % só deve conter caracteres alfanuméricos',
					fields:':text,textarea,:password'
				},
				'jEmail':{
					test:function(f) {
						return (/^[a-zA-Z0-9_.+-]{2,}@([a-zA-Z0-9-]{2,}.)+[a-zA-Z0-9]{2,4}$/i.test(f.value));
					},
					msg:'O campo % deve possuir um e-mail válido.',
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
					msg:'O campo % deve possuir um CPF válido.',
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
					msg:'O campo % deve possuir um CNPJ válido.',
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
					msg:'O campo % é obrigatório',
					fields:'*'
				}
			}
		}
	});
})(jQuery);