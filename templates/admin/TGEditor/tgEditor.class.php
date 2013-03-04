<?PHP
/**
 * author:jeffxie<jeffxie@gmail.com>
 * 2011-01-10
 */
class sinaEditor{
	var $BasePath;
	var $Width;
	var $Height;
	var $eName;
	var $Value;
	var $AutoSave;
	function sinaEditor($eName){
		$this->eName=$eName;
		$this->BasePath='.';
		$this->AutoSave=false;
		$this->Height=500;
		$this->Width=700;
	}
	function __construct($eName){
		$this->sinaEditor($eName);
	}
	function create(){
		$ReadCookie=$this->AutoSave?1:0;
		print <<<eot
		<textarea name="{$this->eName}" id="{$this->eName}" style="display:none;">{$this->Value}</textarea>
		<iframe id="tgedit" name="tgedit" src="{$this->BasePath}/Edit/editor.htm?id={$this->eName}&ReadCookie={$ReadCookie}" frameBorder="0" marginHeight="0" marginWidth="0" scrolling="No" width="{$this->Width}" height="{$this->Height}"></iframe>
eot;
	}
}