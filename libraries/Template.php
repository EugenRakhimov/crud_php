<?php

  class Template
  {
    protected $template;
    protected $vars = array();

    function __construct($template)
    {
      $this->template = $template;
    }
    public function _get($key)
    {
      return $this->vars[$key];
    }
    public function _set($key, $value)
    {
      $this->vars[$key] = $value;
    }
    public function __toString()
    {
      extract($this->vars);
      chdir(dirname($this->template));
      ob_start();
      include basename($this->template);
      return ob_get_clean();
    }
  }

?>
