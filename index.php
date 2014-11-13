<?php

/*
 *---------------------------------------------------------------
 * APPLICATION ENVIRONMENT
 * 응용 프로그램 환경
 *---------------------------------------------------------------
 *
 * You can load different configurations depending on your
 * current environment. Setting the environment also influences
 * things like logging and error reporting.
 * 당신은 당신에 따라 다른 구성을로드 할 수 있습니다
 * 현재의 환경.환경을 설정하면 영향
 * 로깅 및 오류보고 같은 것들.
 * This can be set to anything, but default usage is:
 * 이 값으로 설정하지만, 기본 사용법은 할 수있다 :
 *     development//모든오류 표시(개발)
 *     testing
 *     production//오류를 표시하지 않음(서비스)
 *		개발
 *		테스트
 *		생산
 * NOTE: If you change these, also change the error_reporting() code below
 * 참고 :이을 변경하는 경우에는 아래의 코드를 ()하고 error_reporting을 변경
 */
	define('ENVIRONMENT', 'development');
/*
 *---------------------------------------------------------------
 * ERROR REPORTING
 *---------------------------------------------------------------
 *
 * Different environments will require different levels of error reporting.
 * By default development will show errors but testing and live will hide them.
 * 다른 환경에서 오류보고 다른 수준이 필요합니다.
 * 기본 개발로 오류를 표시하지만 테스트 및 라이브 숨길 것입니다.
 */

if (defined('ENVIRONMENT'))
{
	switch (ENVIRONMENT)
	{
		case 'development':
			error_reporting(E_ALL);
		break;
	
		case 'testing':
		case 'production':
			error_reporting(0);
		break;

		default:
			exit('The application environment is not set correctly.');
	}
}

/*
 *---------------------------------------------------------------
 * SYSTEM FOLDER NAME 폴더 이름
 *---------------------------------------------------------------
 *
 * This variable must contain the name of your "system" folder.
 * Include the path if the folder is not in the same  directory
 * as this file.
 * 이 변수는 "시스템"폴더의 이름을 포함해야합니다.
 * 폴더가 같은 디렉토리에없는 경우 * 경로를 포함
 * 이 파일의 이름과 같습니다.
 *
 */
	$system_path = 'system';

/*
 *---------------------------------------------------------------
 * APPLICATION FOLDER NAME (어플리케이션 디렉토리 이름)
 *---------------------------------------------------------------
 *
 * If you want this front controller to use a different "application"
 * folder then the default one you can set its name here. The folder
 * can also be renamed or relocated anywhere on your server.  If
 * you do, use a full server path. For more info please see the user guide:
 * http://codeigniter.com/user_guide/general/managing_apps.html
 * 이 프론트 컨트롤러는 다른 "응용 프로그램"을 사용하려는 경우
 * 폴더는 기본 하나는 여기에 이름을 설정할 수 있습니다.폴더
 * 또한, 이름을 변경하거나 서버에 어디 재배치 할 수 있습니다. 면
 * 당신은 전체 서버 경로를 사용합니까. 더 많은 정보는 사용자 설명서를 참조하십시오 :
 *
 * NO TRAILING SLASH! (역슬래시 금지)
 *
 */
	$application_folder = 'application';

/*
 * --------------------------------------------------------------------
 * DEFAULT CONTROLLER(기본 컨트롤러)
 * --------------------------------------------------------------------
 *
 * Normally you will set your default controller in the routes.php file.
 * You can, however, force a custom routing by hard-coding a
 * specific controller class/function here.  For most applications, you
 * WILL NOT set your routing here, but it's an option for those
 * special instances where you might want to override the standard
 * routing in a specific front controller that shares a common CI installation.
 *
 * IMPORTANT:  If you set the routing here, NO OTHER controller will be
 * callable. In essence, this preference limits your application to ONE
 * specific controller.  Leave the function name blank if you need
 * to call functions dynamically via the URI.
 *
 * Un-comment the $routing array below to use this feature
 * 일반적으로는 routes.php 파일에 기본 컨트롤러를 설정합니다.
 * 그러나, 하드 코딩하여 사용자 정의 라우팅을 강제 할 수
 * 여기에 특정 컨트롤러 클래스 / 함수입니다. 대부분의 응용 프로그램의 경우,
 * 여기에 귀하의 경로를 설정하지 않습니다하지만 그것은 사람들을위한 옵션이다
 * 당신이 표준을 오버라이드 (override) 할 수 있습니다 * 특수 인스턴스
 * 일반적인 CI 설치를 공유하는 특정 앞 컨트롤러에 라우팅.
 *
 * 중요 : 여기 라우팅을 설정할 경우, 다른 컨트롤러가 없을 것
 * 호출. 본질적으로,이 환경은 하나에 응용 프로그램을 제한
 * 특정 컨트롤러. 당신이 필요로하는 경우에 함수 이름을 비워두고
 * URI를 통해 동적으로 함수를 호출합니다.
 *
 *이 기능을 사용하려면 아래의 $ 라우팅 배열의 선택을 취소 코멘트

 / / "컨트롤러"폴더에 상대적인 디렉토리 이름입니다. 공백으로 두십시오
컨트롤러는 "컨트롤러"폴더 내의 하위 폴더에없는 / / 경우
/ / $ 라우팅 [ '디렉토리'] = '';

/ / 컨트롤러 클래스 파일의 이름입니다. 예 : Mycontroller
/ / $ 라우팅 [ '컨트롤러'] = '';

/ / 컨트롤러 함수가 호출 할 싶습니다.
/ / $ 라우팅 [ '기능'] = '';
 */
	// The directory name, relative to the "controllers" folder.  Leave blank
	// if your controller is not in a sub-folder within the "controllers" folder
	// $routing['directory'] = '';

	// The controller class file name.  Example:  Mycontroller
	// $routing['controller'] = '';

	// The controller function you wish to be called.
	// $routing['function']	= '';


/*
 * -------------------------------------------------------------------
 *  CUSTOM CONFIG VALUES(CUSTOM CONFIG 값)
 * -------------------------------------------------------------------
 *
 * The $assign_to_config array below will be passed dynamically to the
 * config class when initialized. This allows you to set custom config
 * items or override any default config values found in the config.php file.
 * This can be handy as it permits you to share one application between
 * multiple front controller files, with each file containing different
 * config values.
 *
 * Un-comment the $assign_to_config array below to use this feature
 * 아래의 $ assign_to_config 배열은 동적으로 전달됩니다
 * 초기화 * 구성 클래스입니다. 이렇게하면 사용자 정의 설정을 설정할 수 있습니다
 * 항목 또는 기본 설정을 재정의는 config.php 파일 파일에있는 값입니다.
 * 당신이 사이에 응용 프로그램을 공유하는 것을 허용 등 *이 유용 할 수 있습니다
 * 각 파일에 * 여러 프런트 컨트롤러 파일은 다른 포함
 * 설정 값입니다.
 *
 *이 기능을 사용하려면 아래의 $ assign_to_config 배열의 선택을 취소 코멘트
 *
 */
	// $assign_to_config['name_of_config_item'] = 'value of config item';



// --------------------------------------------------------------------
// END OF USER CONFIGURABLE SETTINGS.  DO NOT EDIT BELOW THIS LINE
//사용자 구성 설정 / /는 END. 이 줄의 밑에 편집하지 마십시오
// --------------------------------------------------------------------

/*
 * ---------------------------------------------------------------
 *  Resolve the system path for increased reliability
 * 신뢰성 향상을위한 시스템 경로를 해결
 * ---------------------------------------------------------------
 */

	// Set the current directory correctly for CLI requests
	// CLI 요청을 올바르게 현재 디렉토리 설정
	if (defined('STDIN'))
	{
		chdir(dirname(__FILE__));
	}

	if (realpath($system_path) !== FALSE)
	{
		$system_path = realpath($system_path).'/';
	}

	// ensure there's a trailing slash
	// 후행 슬래시가있어 확인
	$system_path = rtrim($system_path, '/').'/';

	// Is the system path correct?
	//시스템 경로가 정확합니까?
	//시스템 폴더 경로가 제대로 설정해야 표시되지 않습니다.
	//다음 파일을 열고이 문제를 해결하십시오
	if ( ! is_dir($system_path))
	{
		exit("Your system folder path does not appear to be set correctly. Please open the following file and correct this: ".pathinfo(__FILE__, PATHINFO_BASENAME));
	}

/*
 * -------------------------------------------------------------------
 *  Now that we know the path, set the main path constants
 *  이제 우리는 경로를 알고, 기본 경로 상수를 설정
 * -------------------------------------------------------------------
 */
	// The name of THIS file 파일의 이름
	define('SELF', pathinfo(__FILE__, PATHINFO_BASENAME));

	// The PHP file extension PHP 파일 확장자
	// this global constant is deprecated. 이 글로벌 상수는 사용되지 않습니다
	define('EXT', '.php');

	// Path to the system folder 시스템 폴더의 경로
	define('BASEPATH', str_replace("\\", "/", $system_path));

	// Path to the front controller (this file) 프론트 컨트롤러 (이 파일)의 경로
	define('FCPATH', str_replace(SELF, '', __FILE__));

	// Name of the "system folder" "시스템 폴더"의 이름
	define('SYSDIR', trim(strrchr(trim(BASEPATH, '/'), '/'), '/'));


	// The path to the "application" folder "응용 프로그램"폴더의 경로
	if (is_dir($application_folder))
	{
		define('APPPATH', $application_folder.'/');
	}
	else
	{
		if ( ! is_dir(BASEPATH.$application_folder.'/'))
		{
			//응용 프로그램 폴더 경로가 제대로 설정해야 표시되지 않습니다. 다음 파일을 열고이 문제를 해결하십시오
			exit("Your application folder path does not appear to be set correctly. Please open the following file and correct this: ".SELF);
		}

		define('APPPATH', BASEPATH.$application_folder.'/');
	}

/*
 * --------------------------------------------------------------------
 * LOAD THE BOOTSTRAP FILE 부트 스트랩 파일을로드
 * --------------------------------------------------------------------
 *
 * And away we go... 그리고 멀리 간다 ...
 *
 */
require_once BASEPATH.'core/CodeIgniter.php';
/* End of file index.php */
/* Location: ./index.php */