<?php

/*
 * This file is part of Remiii Twig Extension Repository (Quick and Dirty Translations).
 *
 * (c) 2012 Remi BARBE (aka Remiii) < free-software ( at ) remibarbe ( dot ) fr>
 *
 * This code is released under the MIT License.
 */
class Remiii_Twig_Extensions_QD_i18n extends Twig_Extension
{

    protected $myLocale ;
    protected $pathToTranslations ;

    /**
     * Constructor.
     */    
    public function __construct( $aLocale = 'en' , $aPath = './' )
     {
         $this -> myLocale = $aLocale ;
         $this -> pathToTranslations = $aPath ;        
     }
    
    /**
     * Returns the name of the extension.
     *
     * @return string The extension name
     */
    public function getName ( )
    {
        return 'QD_i18n' ;
    }

    /**
     *
     */
    public function getFilters ( )
    {
        return array (
            'qdtrans' => new Twig_Filter_Method ( $this , 'QD_i18l' ) ,
        ) ;
    }

    /**
     *  
     */
    public function QD_i18l ( $aString )
    {
        require $this -> pathToTranslations . 'translations.' . $this -> myLocale . '.php' ;
        if ( array_key_exists ( $aString , $languagesStrings ) )
        {
            return $languagesStrings [ $aString ] ;
        }
        else
        {
            return $aString ;
        }
    }

}
