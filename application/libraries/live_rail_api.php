<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class live_rail_api {
	/**
    * the api URL
    */
    private $_apiUrl;
    /**
    * the token
    */
    private $_token;
    /**
    * last xml
    */
    private $_xml;
    /**
    * the parsed XML
    */
    private $_xmlDoc;
    /**
    * use session for storing login data
    * @var bool
    */
    private $_useSession    = true;

    /**
    * the constructor
    * @param string $pApiUrl
    * @return LiveRailApi
    */
    function __construct( $pApiUrl = "http://api4.liverail.com" )
//     function __construct( $pApiUrl = "http://api4.int.liverail.com" )
    {
    	$this->ci =& get_instance();
        $this->ci->load->library('session');
        $this->ci->load->helper(array('alert'));
        $this->_apiUrl  = rtrim( $pApiUrl, "/" );
    } //end function __constructor

    /**
    * sets the api url
    * @param mixed $pApiUrl
    * @return void
    */
    public function setApiUrl( $pApiUrl )
    {
        $this->_apiUrl  = $pApiUrl;
        if ( $this->_useSession ) {
            $_SESSION["LiveRailApi"]["url"] = $pApiUrl;
        } //end if
    } //end function setApiUrl

    /**
    * sets the use session flag
    * @param bool $pVar
    * @return void
    */
    public function setUseSession( $pVar = true )
    {
        $this->_useSession  = (bool) $pVar;
    } //end function setUseSession

    /**
    * performs the login action
    * @param string $pUser
    * @param string $pPassword
    * @param bool $applyMd5
    * @return $token
    */
    function login( $pUser, $pPassword, $applyMd5 = true )
    {
    	$_SESSION["LiveRailApi"]    = array();
    	if ( $this->_useSession ) {
    		if ( isset( $_SESSION["LiveRailApi"]["url"] ) ) {
    			$this->_apiUrl  = $_SESSION["LiveRailApi"]["url"];
    		} //end if
    	} //end if
    	
        /* make the login call */
        $postAr     = array(
            "username"  => $pUser,
            "password"  => ( $applyMd5 ? md5( $pPassword ) : $pPassword )
        );
        $post       = $this->_flattenArray( $postAr );
        $curl       = curl_init( $this->_apiUrl . "/login" );
        curl_setopt( $curl, CURLOPT_RETURNTRANSFER, true );
        curl_setopt( $curl, CURLOPT_POST, true );
        curl_setopt( $curl, CURLOPT_POSTFIELDS, $post );
        $data        = curl_exec( $curl );
        curl_close( $curl );
        $this->_xml = $data;
        
        /* load the XML */
        $this->_xmlDoc  = @simplexml_load_string( $data );
        if ( $this->_xmlDoc === false ) {
            return false;
        } //end if

        /* check the status */
        if ( (string) $this->_xmlDoc->status != "success" ) {
            return false;
        } //end if

        /* get the token */
        $token  = (string) @$this->_xmlDoc->auth->token;
        if ( $token == "" ) {
            return false;
        } //end if
        
        /* get the entity_id */
        $entity_id  = (string) @$this->_xmlDoc->auth->entity->entity_id;
        if ( $entity_id == "" ) {
        	return false;
        } //end if

        /* save the token */
        $this->_token   = $token;
        
        if ( $this->_useSession ) {
            $_SESSION["LiveRailApi"]    = array(
                "url"       => $this->_apiUrl,
                "token"     => $token,
                "username"  => $pUser,
            	"entity_id" => $entity_id
            );
        } //end if

        return true;
    } //end function login
    
    /**
     * gets /publisher/frequency/list
     * @param int $token
     * @return $data
     */
    function pullReport(){
    	if ( $this->_useSession ) {
    		if ( isset( $_SESSION["LiveRailApi"]["token"] ) ) {
    			$this->_token   = $_SESSION["LiveRailApi"]["token"];
    		} //end if
    	} //end if
    	
    	$postAr     = array(
    			"token"  => $this->_token,
    			"start"  => "2014-10-20",
    			"end"  => "2014-11-01",
    			"dimensions"  => "day",
    			"metrics"  => "impressions,revenue,revenue_ecpm",
    	);
    	
    	$post       = $this->_flattenArray( $postAr );
    	$curl       = curl_init( $this->_apiUrl . "/statistics/aggregated" );
    
    	curl_setopt( $curl, CURLOPT_RETURNTRANSFER, true );
    	curl_setopt( $curl, CURLOPT_POST, true );
    	curl_setopt( $curl, CURLOPT_POSTFIELDS, $post );
    	$data        = curl_exec( $curl );
    	curl_close( $curl );
    	$this->_xml = $data;
    	
    	/* load the XML */
    	$this->_xmlDoc  = @simplexml_load_string( $data );
    	if ( $this->_xmlDoc === false ) {
    		return false;
    	} //end if
    
    	/* check the status */
    	if ( (string) $this->_xmlDoc->status != "success" ) {
    		return false;
    	} //end if
    	
//     	foreach($this->_xmlDoc as $key => $key_value){
//     		echo $key." : ".$key_value.' <br />';
//     	}
//     	echo '<hr/>';
    	
//     	foreach($this->_xmlDoc->user as $val){
//     		foreach($val as $key => $key_value){
//     			echo $key." : ".$key_value.' <br />';
//     		}
//     		echo '<hr/>';
//     	}
    	
//     	foreach($this->_xmlDoc->auth as $vals){
//     		foreach($vals as $val){
//     			foreach($val as $key => $key_value){
// 	    			echo $key." : ".$key_value.' <br />';
//     			}
//     			echo '<hr/>';
//     		}
//     	}
    	
//     	foreach($this->_xmlDoc->report as $vals){
//     		foreach($vals as $val){
//     			foreach($val as $key => $key_value){
//     				echo $key." : ".$key_value.' <br />';
//     			}
//     			echo '<hr/>';
//     		}
//     	}
    
    	return true;
    } //end function getPublisherFrequencyList

    /**
    * sets a current entity
    * @param int $pEntity
    * @param bool $pHeaderMode
    * @return boolean
    */
    function setEntity( $pEntity, $pHeaderMode = true )
    {
        if ( $this->_useSession ) {
            if ( isset( $_SESSION["LiveRailApi"] ) && isset( $_SESSION["LiveRailApi"]["token"] ) ) {
                $this->setToken( $_SESSION["LiveRailApi"]["token"] );
            } //end if
            if ( isset( $_SESSION["LiveRailApi"]["url"] ) ) {
                $this->_apiUrl  = $_SESSION["LiveRailApi"]["url"];
            } //end if
        } //end if

        if ( is_null( $this->_token ) ) {
            $this->_xml = null;
            return false;
        } //end if

        /* make the set entity call */
        $postAr     = array(
            "entity_id"    => $pEntity
        );
        $post       = $this->_flattenArray( $postAr );
        $curl       = curl_init( $this->_apiUrl . "/set/entity" );
        if ( $pHeaderMode ) {
            $headers    = array( "LiveRailApiToken: " . base64_encode( $this->_token ) );
            curl_setopt( $curl, CURLOPT_HTTPHEADER, $headers );
        } else {
            $post   .= "&token=" . urlencode( $this->_token );
        } //end if
        curl_setopt( $curl, CURLOPT_RETURNTRANSFER, true );
        curl_setopt( $curl, CURLOPT_POST, true );
        curl_setopt( $curl, CURLOPT_POSTFIELDS, $post );
        $data        = curl_exec( $curl );
        curl_close( $curl );
        $this->_xml = $data;

        /* load the XML */
        $this->_xmlDoc  = @simplexml_load_string( $data );
        if ( $this->_xmlDoc === false ) {
            return false;
        } //end if

        /* check the status */
        if ( (string) $this->_xmlDoc->status != "success" ) {
            return false;
        } //end if

        if ( $this->_useSession ) {
            $_SESSION["LiveRailApi"]["entityId"]    = $pEntity;
        } //end if
        
        return true;
    } //end function setEntity
    
    /**
     * getList : api test
     * @param int $token
     * @return $data
     */
    function getList(){
    	if ( $this->_useSession ) {
            if ( isset( $_SESSION["LiveRailApi"]["token"] ) ) {
                $this->_token   = $_SESSION["LiveRailApi"]["token"];
            } //end if
        } //end if
        
        $postAr     = array(
        		"token"  => $this->_token
        );
        
        $post       = $this->_flattenArray( $postAr );
        $curl       = curl_init( $this->_apiUrl . "/entity/ldb/list" );
        
        curl_setopt( $curl, CURLOPT_RETURNTRANSFER, true );
        curl_setopt( $curl, CURLOPT_POST, true );
        curl_setopt( $curl, CURLOPT_POSTFIELDS, $post );
        $data        = curl_exec( $curl );
        curl_close( $curl );
        $this->_xml = $data;
        
        /* load the XML */
        $this->_xmlDoc  = @simplexml_load_string( $data );
        if ( $this->_xmlDoc === false ) {
        	return false;
        } //end if
        
        /* check the status */
        if ( (string) $this->_xmlDoc->status != "success" ) {
        	return false;
        } //end if
        
//     	foreach($this->_xmlDoc->entities as $key => $key_value){
//     		echo $key." : ".$key_value.' <br />';
//     	}
//     	echo '<hr/>';
        
//         print_r($this->_xmlDoc);
        
    	return true;
	} //end function getPublisherFrequencyList
	
	/**
	 * gets /revenue-share/list
	 * @param int $token
	 * @return $result_data
	 */
	function getRevenueShareList(){
		if ( $this->_useSession ) {
			if ( isset( $_SESSION["LiveRailApi"]["token"] ) ) {
				$this->_token   = $_SESSION["LiveRailApi"]["token"];
			} //end if
		} //end if
		
		$postAr     = array(
				"token"  => $this->_token
		);
		
		$post       = $this->_flattenArray( $postAr );
		$curl       = curl_init( $this->_apiUrl . "/revenue-share/list" );
		
		curl_setopt( $curl, CURLOPT_RETURNTRANSFER, true );
		curl_setopt( $curl, CURLOPT_POST, true );
		curl_setopt( $curl, CURLOPT_POSTFIELDS, $post );
		$data        = curl_exec( $curl );
		curl_close( $curl );
		$this->_xml = $data;
		
		/* load the XML */
		$this->_xmlDoc  = @simplexml_load_string( $data );
		if ( $this->_xmlDoc === false ) {
			return false;
		} //end if
		
		/* check the status */
		if ( (string) $this->_xmlDoc->status != "success" ) {
			return false;
		} //end if
		
		$result_data = array();
		foreach ($this->_xmlDoc->partners->list->partner as $partner) {
			$id = (string)$partner->partner_id;
			$name = (string)$partner->name;
			$share = (string)$partner->share;
			$type = (string)$partner->type;
			$entity_status = (string)$partner->entity_status;
			
			$result = array("partner_id" => $id, "name" => $name, "share" => $share, "type" => $type, "entity_status" => $entity_status);
			array_push($result_data, $result);
		}
		
		return $result_data;
	} //end function getRevenueShareList
	
    /**
    * performs a logout
    * @return void
    */
    public function logout()
    {
        if ( $this->_useSession ) {
            if ( isset( $_SESSION["LiveRailApi"]["token"] ) ) {
                $this->_token   = $_SESSION["LiveRailApi"]["token"];
            } //end if
        } //end if
        $res    = $this->callApi( "/logout", array( "token" => $this->_token ), false );
        if ( $this->_useSession ) {
            $_SESSION["LiveRailApi"]    = array();
            unset( $_SESSION["LiveRailApi"] );
        } //end if
        return $res;
    } //end function logout

    /**
    * unsets the current entity
    * @return void
    */
    public function unsetEntity()
    {
        if ( $this->_useSession ) {
            if ( isset( $_SESSION["LiveRailApi"]["token"] ) ) {
                $this->_token   = $_SESSION["LiveRailApi"]["token"];
            } //end if
        } //end if
        $res    = $this->callApi( "/unset/entity", array( "token" => $this->_token ), false );
        if ( $this->_useSession && $res ) {
            if ( isset( $_SESSION["LiveRailApi"]["entityId"] ) ) {
                $_SESSION["LiveRailApi"]["entityId"]    = 0;
                unset( $_SESSION["LiveRailApi"]["entityId"] );
            } //end if
        } //end if
        return $res;
    } //end function logout

    /**
    * make an api call
    * @param string $url
    * @param array $pPostAr
    * @param bool $pHeaderMode for coditza
    * @return boolean
    */
    public function callApi( $pUrl, $pPostAr, $pHeaderMode = true )
    {
        if ( $this->_useSession ) {
            if ( isset( $_SESSION["LiveRailApi"]["url"] ) ) {
                $this->_apiUrl  = $_SESSION["LiveRailApi"]["url"];
            } //end if
        } //end if

        /* make the set entity call */
        $curl       = curl_init( $this->_apiUrl . "/" . ltrim( $pUrl, "/" ) );
        if ( is_array( $pPostAr ) ) {
            $post   = $this->_flattenArray( $pPostAr );
        } else {
            $post   = $pPostAr;
        } //end if

        if ( $pHeaderMode ) {
            $headers    = array( "LiveRailApiToken: " . base64_encode( $this->_token ) );
            curl_setopt( $curl, CURLOPT_HTTPHEADER, $headers );
        } //end if

        curl_setopt( $curl, CURLOPT_RETURNTRANSFER, true );
        curl_setopt( $curl, CURLOPT_POST, true );
        curl_setopt( $curl, CURLOPT_POSTFIELDS, $post );
        $data       = curl_exec( $curl );
        curl_close( $curl );
        $this->_xml = $data;

        /* load the XML */
        $this->_xmlDoc  = @simplexml_load_string( $data );
        if ( $this->_xmlDoc === false ) {
            return false;
        } //end if

        /* check the status */
        if ( (string) $this->_xmlDoc->status != "success" ) {
            return false;
        } //end if

        return true;
    } //end function callApi

    /**
    * returns the token
    * @return string
    */
    public function getToken()
    {
        return $this->_token;
    } //end function getToken

    /**
    * sets the token
    * @param string $pToken
    * @return void
    */
    public function setToken( $pToken )
    {
        $this->_token   = $pToken;
    } //end function setToken

    /**
    * returns the last XML returned by the API
    * @return string
    */
    public function getLastApiXml()
    {
        return $this->_xml;
    } //end function returnLastApiXml

    /**
    * returns an instance of SimpleXML for the last API xml
    * @return SimpleXML
    */
    public function getLastApiXmlDoc()
    {
        return $this->_xmlDoc;
    } //end function getLastApiXmlDoc

    /**
    * flattens an array & returns is as a "GET" string
    * @param mixed $pArray
    * @param string $pPrefix
    * @return string
    */
    private function _flattenArray( $pArray, $pPrefix = "" )
    {
        $finalAr    = array();
        foreach ( $pArray as $k => $v ) {
            if ( $pPrefix != "" ) {
                $k  = "{$pPrefix}[{$k}]";
            } //end if
            if ( is_array( $v ) ) {
                $finalAr[]  = $this->_flattenArray( $v, $k );
            } else {
                $finalAr[]  = $k . "=" . urlencode( $v );
            } //end if
        } //end foreach

        return implode( "&", $finalAr );
    } //end function _flattenArray
} //end class LiveRailApi