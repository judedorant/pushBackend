<?php

namespace App\Http\Controllers\Ldap;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Exception;
use App\Models\Users;


class LoginAuth extends Controller
{


    public function getusers(){
        $user = Users::where('ntlogin', "jmbelicano")->get();


        return response()->json([
            'success' => false,
            'ous' => "test",
            'users' => $user,
            'announcements' => "announcesment",
            'errors' => true
        ], 200);

    }
    //
    public function authLdap(Request $request){
        // return response()->json([
        //     'success' => false,
        //     'ous' => "test",
        //     'users' => "ous",
        //     'announcements' => "announcesment",
        //     'errors' => true
        // ], 200);

        $ntlogin = $request->ntlogin;
		$adPass = $request->password;

		// $ntlogin = 'cptest';
		$adServer = '10.249.143.6';
		$adUser = $ntlogin.'@panasiaticsolutions.net';
		// $adPass = 'p@ssw0rd';
		$adBaseDn = 'dc=panasiaticsolutions,dc=net'; // Base DN to search for users

		// Connect to AD
		$ldapConn = ldap_connect($adServer);
		ldap_set_option($ldapConn, LDAP_OPT_PROTOCOL_VERSION, 3);
		ldap_set_option($ldapConn, LDAP_OPT_REFERRALS, 0);

        try
        {
            $result = ldap_bind($ldapConn, $adUser, $adPass);

			$result = ldap_search($ldapConn, $adBaseDn, "(sAMAccountName=$ntlogin)");
			$entries = ldap_get_entries($ldapConn, $result);

            if($entries['count'] == 0){
                return response()->json($ntlogin . "No Ldap query");
            }else{

            }

			$userInfo = ['displayName' => isset($entries[0]['displayname'][0]) ? $entries[0]['displayname'][0] : 'Unknown','organizationalUnit' => $entries[0]['dn'],];
			$name = $userInfo['displayName'];
			$ou1 = $entries[0]['dn'];

			$getstringName = strlen($name);
			$finalOU = substr($ou1, ($getstringName + 4));


			 // Extract the Organizational Unit (OU) from the DN
			 preg_match('/OU=([^,]+)/', $ou1, $ouMatches);
			 $ou = isset($ouMatches[1]) ? $ouMatches[1] : $ou1;

            $dataarray = [];
            $dataarray[] = ['name' => $name,'ou' => $finalOU];
            // return response()->json($name . "  Succesfully yours");
            // users, ous, announcements
            return response()->json([
                'success' => true,
                'ous' => $name,
                'users' => "ous",
                'data' => $dataarray,
                'announcements' => "announcesment",
                'errors' => false
            ], 200);

			ldap_unbind($ldapConn);

        }
        catch(Exception $e)
        {
            // return response()->json($e . "test");

            return response()->json([
                'success' => false,
                'data' => 'Account is Disabled. Please contact IT to enable your NT account',
                'errors' => true,
            ], 500);
        }
    }
}
