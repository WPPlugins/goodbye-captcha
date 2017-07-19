<?php
/*
 * Copyright (C) 2015 Mihai Chelaru
 */
final class MchGdbcTrustedIPRanges
{
	public static function isIPInCloudFlareRanges($ipAddress, $ipVersion)
	{
	
		return ( $ipVersion === MchGdbcIPUtils::IP_VERSION_4 )
				?
				self::isIPInRanges($ipAddress, $ipVersion, array(1729491968=>1729492991,1729546240=>1729547263,1730085888=>1730086911,1745879040=>1746927615,1822605312=>1822621695,2197833728=>2197834751,2372222976=>2372239359,2728263680=>2728394751,2889875456=>2890399743,2918526976=>2918531071,3161612288=>3161616383,3193827328=>3193831423,3320508416=>3320509439,3324608512=>3324641279,3340468224=>3340470271,))
				:
				self::isIPInRanges($ipAddress, $ipVersion, array('2400:cb00::/32'=>1,'2405:8100::/32'=>1,'2405:b500::/32'=>1,'2606:4700::/32'=>1,'2803:f800::/32'=>1,'2c0f:f248::/32'=>1,));
	
	}
	
	public static function isIPInRackSpaceRanges($ipAddress, $ipVersion)
	{
	
		return ( $ipVersion === MchGdbcIPUtils::IP_VERSION_4 )
				?
				self::isIPInRanges($ipAddress, $ipVersion, array(179828736=>179828991,179829248=>179830271,180076032=>180076543,180092416=>180092671,180220928=>180221951,180222976=>180223231,180223488=>180223999,180289024=>180289535,))
				:
				self::isIPInRanges($ipAddress, $ipVersion, array());
	
	}
	
	public static function isIPInIncapsulaRanges($ipAddress, $ipVersion)
	{
	
		return ( $ipVersion === MchGdbcIPUtils::IP_VERSION_4 )
				?
				self::isIPInRanges($ipAddress, $ipVersion, array(759185408=>759186431,1729951744=>1729952767,1805286912=>1805287167,2508081152=>2508083199,3104537600=>3104538623,3236315136=>3236331519,3331268608=>3331276799,3344138240=>3344140287,))
				:
				self::isIPInRanges($ipAddress, $ipVersion, array('2a02:e980::/29'=>1,));
	
	}
	
	public static function isIPInAmazonCloudFrontRanges($ipAddress, $ipVersion)
	{
	
		return ( $ipVersion === MchGdbcIPUtils::IP_VERSION_4 )
				?
				self::isIPInRanges($ipAddress, $ipVersion, array(220200960=>220332031,875429888=>875446271,877920256=>878051327,886996992=>887029759,917897216=>917962751,918552576=>918618111,921042944=>921108479,921665536=>921690111,921731072=>921747455,3438715904=>3438717951,3438718464=>3438723071,3455827968=>3455836159,3455842560=>3455844095,3632865280=>3632873471,))
				:
				self::isIPInRanges($ipAddress, $ipVersion, array());
	
	}
	
	public static function isIPInAmazonEC2Ranges($ipAddress, $ipVersion)
	{
	
		return ( $ipVersion === MchGdbcIPUtils::IP_VERSION_4 )
				?
				self::isIPInRanges($ipAddress, $ipVersion, array(221642752=>221773823,387186688=>387448831,583008256=>584056831,597295104=>597360639,597426176=>598212607,775127040=>775147519,775149568=>775159807,780730368=>780795903,839909376=>840171519,846200832=>846266367,872415232=>875429887,875560960=>876412927,876478464=>877330431,877395968=>877723647,878051328=>878444543,878702592=>878706175,878706432=>878706591,884998144=>885129215,885260288=>886571007,886833152=>886996991,910163968=>912261119,915406848=>917766143,917962752=>918552575,918618112=>920518655,920551424=>921042943,921174016=>921632767,921763840=>922746879,1137311744=>1137328127,1210851328=>1210859519,1264943104=>1264975871,1333592064=>1333624831,1618935808=>1618968575,1728317440=>1728319487,1796472832=>1796734975,2063122432=>2063138815,2927689728=>2927755263,2938732544=>2938765311,2954903552=>2954911743,2955018240=>2955083775,2974253056=>2974285823,3091726336=>3091857407,3098116096=>3098148863,3106961408=>3106962431,3438051328=>3438084095,3635863552=>3635867647,))
				:
				self::isIPInRanges($ipAddress, $ipVersion, array());
	
	}
	
	public static function isIPInAutomatticRanges($ipAddress, $ipVersion)
	{
	
		return ( $ipVersion === MchGdbcIPUtils::IP_VERSION_4 )
				?
				self::isIPInRanges($ipAddress, $ipVersion, array(1076022784=>1076023039,1279981696=>1279981823,1279983360=>1279983487,3221241856=>3221258239,3333780480=>3333781503,))
				:
				self::isIPInRanges($ipAddress, $ipVersion, array('2620:115:c000::/44'=>1,));
	
	}
	
	public static function isIPInSucuriCloudProxyRanges($ipAddress, $ipVersion)
	{
	
		return ( $ipVersion === MchGdbcIPUtils::IP_VERSION_4 )
				?
				self::isIPInRanges($ipAddress, $ipVersion, array(1123600384=>1123601407,3109938176=>3109939199,3227026944=>3227027455,3229415680=>3229415935,))
				:
				self::isIPInRanges($ipAddress, $ipVersion, array('2a02:fe80::/29'=>1,));
	
	}
	
	public static function isIPInTrustedRanges($ipAddress, $ipVersion)
	{
		return self::isIPInCloudFlareRanges($ipAddress, $ipVersion) || self::isIPInRackSpaceRanges($ipAddress, $ipVersion) || self::isIPInIncapsulaRanges($ipAddress, $ipVersion) || self::isIPInAmazonCloudFrontRanges($ipAddress, $ipVersion) || self::isIPInAmazonEC2Ranges($ipAddress, $ipVersion) || self::isIPInAutomatticRanges($ipAddress, $ipVersion) || self::isIPInSucuriCloudProxyRanges($ipAddress, $ipVersion) ;
	}
	
	private static function isIPInRanges($ipAddress, $ipVersion, $arrIPs)
	{
		if(	$ipVersion === MchGdbcIPUtils::IP_VERSION_4 )
		{
			$ipNumber = (float)MchGdbcIPUtils::ipAddressToNumber($ipAddress, $ipVersion, false);

			if( isset($arrIPs[$ipNumber]) )
				return true;

			foreach($arrIPs as $minIpNumber => $maxIpNumber)
			{
				$minIpNumber < 0 ? $minIpNumber += 4294967296 : null; 
				if( $ipNumber < $minIpNumber ) // the array is already sorted by key
					return false;

				if( ($minIpNumber <= $ipNumber) && ($ipNumber <= $maxIpNumber) )
					return true;
			}

			return false;
		}

		foreach($arrIPs as $cidrBlock => $maxIpNumber)
		{
			if( ! MchGdbcIPUtils::isIpInCIDRRange($ipAddress, $cidrBlock, MchGdbcIPUtils::IP_VERSION_6, true) )
				continue;

			return true;
		}

		return false;
	}
	
	
}