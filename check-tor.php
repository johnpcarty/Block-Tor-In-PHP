<?php

/*
Note:
- I block Tor, because I need to protect the time and investment
  I made in building a thesaurus of job titles.  One person could use Tor to 
  scrape my site, and that is a risk I cannot accept.
- Several other sites block Tor:
    https://trac.torproject.org/projects/tor/wiki/org/doc/ListOfServicesBlockingTor
- People who use Tor do not like to be blocked:
    https://trac.torproject.org/projects/tor/wiki/org/projects/DontBlockMe

Limitations:
 - ***This is only a demonstration of how to block Tor IP Addresses.***
    The Tor list is from 2016-02-22, so the IP Addresses may be out of date.
    The most recent list of tor ip addresses can be found at:
        https://check.torproject.org/exit-addresses
 - This function only handles IPv4 addresses. An IPv6 Address will say that it is not Tor.
    I expect Tor will add IPv6 at some point in time.

Usage: 
1. Include this php in your php program.  For example:

    include 'check-tor.php';

2. Call the check_tor function:

    $bBlackList = check_tor( [The_IP_Address_to_Check]);
    
3. The $bBlackList will be equal to True if the given IP address is from Tor.

    if ($bBlackList == True) {... [Your Code for a Tor IP Address] ...}

*/

function check_tor($client_ip_address) {
    $bIPIsTor = False;
    
    // make sure it is an IPv4 address
    if (strpos($client_ip_address,'.') > 0) {
 
        // split the IP address into an array
        $client_ip_address_array = explode(".", $client_ip_address);
        
        // calculate the first number from the ip address
        $client_ip_address0 = $client_ip_address_array[0];
        
        // calculate the first two numbers from the ip address
        $client_ip_address1 = $client_ip_address_array[0] . '.' . $client_ip_address_array[1] . '.';
     
        // Determine the 100's digit (first character) and the 10's digit (second character) of the ip address's first number.
        // if the first number is below 10, the first character is zero and the second character is zero.
        // if the first number is below 100, the first character is zero and the second character is the 10's digit.
        // otherwise, the first character is the 100's digit and the second character is the 10's digit.
        if (strlen($client_ip_address0) == 1) {
            $client_ip_address0_first_character = '0';
            $client_ip_address0_second_character = '00';
        } elseif (strlen($client_ip_address0) == 2) {
            $client_ip_address0_first_character = '0';
            $client_ip_address0_second_character = '0' . substr($client_ip_address0,0,1) ;
        } else {
            $client_ip_address0_first_character = substr($client_ip_address0,0,1) ;
            $client_ip_address0_second_character = substr($client_ip_address0,0,2) ;
        }
        
        // The quickest way to determine if the IP Address is a Tor address
        // seems to be to use switch statements to get to the IP Address:
        //  - Check the 100's digit (first character) of the first number 
        //  - Check the 10's digit (second character) of the first number
        //  - Check the first number
        //  - Check the second number
        //  - Check the IP Address
        switch ($client_ip_address0_first_character) { 
        case '0':
           switch ($client_ip_address0_second_character) { 
              case '00': // case second number
                 switch ($client_ip_address0) { 
                    case '1':
                       switch ($client_ip_address1) { 
                          case '1.1.':
                             switch ($client_ip_address) {
                                case '1.1.165.196':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                       }
                       break; // break ip address 0
                    case '2':
                       switch ($client_ip_address1) { 
                          case '2.91.':
                             switch ($client_ip_address) {
                                case '2.91.10.58':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '2.111.':
                             switch ($client_ip_address) {
                                case '2.111.70.28':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                       }
                       break; // break ip address 0
                    case '4':
                       switch ($client_ip_address1) { 
                          case '4.31.':
                             switch ($client_ip_address) {
                                case '4.31.64.70':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                       }
                       break; // break ip address 0
                    case '5':
                       switch ($client_ip_address1) { 
                          case '5.2.':
                             switch ($client_ip_address) {
                                case '5.2.128.74':
                                   $bIPIsTor = True;
                                   break;
                                case '5.2.138.119':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '5.9.':
                             switch ($client_ip_address) {
                                case '5.9.81.41':
                                   $bIPIsTor = True;
                                   break;
                                case '5.9.108.88':
                                   $bIPIsTor = True;
                                   break;
                                case '5.9.146.203':
                                   $bIPIsTor = True;
                                   break;
                                case '5.9.158.75':
                                   $bIPIsTor = True;
                                   break;
                                case '5.9.243.44':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '5.10.':
                             switch ($client_ip_address) {
                                case '5.10.47.78':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '5.28.':
                             switch ($client_ip_address) {
                                case '5.28.62.85':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '5.39.':
                             switch ($client_ip_address) {
                                case '5.39.217.14':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '5.61.':
                             switch ($client_ip_address) {
                                case '5.61.34.63':
                                   $bIPIsTor = True;
                                   break;
                                case '5.61.36.14':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '5.79.':
                             switch ($client_ip_address) {
                                case '5.79.68.161':
                                   $bIPIsTor = True;
                                   break;
                                case '5.79.70.174':
                                   $bIPIsTor = True;
                                   break;
                                case '5.79.97.116':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '5.135.':
                             switch ($client_ip_address) {
                                case '5.135.85.23':
                                   $bIPIsTor = True;
                                   break;
                                case '5.135.158.101':
                                   $bIPIsTor = True;
                                   break;
                                case '5.135.183.142':
                                   $bIPIsTor = True;
                                   break;
                                case '5.135.199.14':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '5.149.':
                             switch ($client_ip_address) {
                                case '5.149.250.67':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '5.157.':
                             switch ($client_ip_address) {
                                case '5.157.82.219':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '5.165.':
                             switch ($client_ip_address) {
                                case '5.165.72.166':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '5.175.':
                             switch ($client_ip_address) {
                                case '5.175.194.69':
                                   $bIPIsTor = True;
                                   break;
                                case '5.175.225.84':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '5.189.':
                             switch ($client_ip_address) {
                                case '5.189.146.133':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '5.196.':
                             switch ($client_ip_address) {
                                case '5.196.1.129':
                                   $bIPIsTor = True;
                                   break;
                                case '5.196.31.80':
                                   $bIPIsTor = True;
                                   break;
                                case '5.196.66.162':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '5.199.':
                             switch ($client_ip_address) {
                                case '5.199.130.188':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '5.206.':
                             switch ($client_ip_address) {
                                case '5.206.21.38':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '5.228.':
                             switch ($client_ip_address) {
                                case '5.228.247.124':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '5.249.':
                             switch ($client_ip_address) {
                                case '5.249.145.164':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                       }
                       break; // break ip address 0
                 }
                 break; // break second number
              case '01': // case second number
                 switch ($client_ip_address0) { 
                    case '14':
                       switch ($client_ip_address1) { 
                          case '14.136.':
                             switch ($client_ip_address) {
                                case '14.136.236.132':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                       }
                       break; // break ip address 0
                    case '18':
                       switch ($client_ip_address1) { 
                          case '18.125.':
                             switch ($client_ip_address) {
                                case '18.125.1.222':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '18.248.':
                             switch ($client_ip_address) {
                                case '18.248.1.85':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                       }
                       break; // break ip address 0
                 }
                 break; // break second number
              case '02': // case second number
                 switch ($client_ip_address0) { 
                    case '23':
                       switch ($client_ip_address1) { 
                          case '23.20.':
                             switch ($client_ip_address) {
                                case '23.20.176.197':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '23.92.':
                             switch ($client_ip_address) {
                                case '23.92.16.229':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '23.95.':
                             switch ($client_ip_address) {
                                case '23.95.113.5':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '23.239.':
                             switch ($client_ip_address) {
                                case '23.239.10.144':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                       }
                       break; // break ip address 0
                    case '24':
                       switch ($client_ip_address1) { 
                          case '24.233.':
                             switch ($client_ip_address) {
                                case '24.233.74.111':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                       }
                       break; // break ip address 0
                 }
                 break; // break second number
              case '03': // case second number
                 switch ($client_ip_address0) { 
                    case '31':
                       switch ($client_ip_address1) { 
                          case '31.19.':
                             switch ($client_ip_address) {
                                case '31.19.176.18':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '31.22.':
                             switch ($client_ip_address) {
                                case '31.22.104.111':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '31.31.':
                             switch ($client_ip_address) {
                                case '31.31.74.47':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '31.185.':
                             switch ($client_ip_address) {
                                case '31.185.27.1':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '31.192.':
                             switch ($client_ip_address) {
                                case '31.192.228.185':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '31.220.':
                             switch ($client_ip_address) {
                                case '31.220.45.6':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                       }
                       break; // break ip address 0
                    case '35':
                       switch ($client_ip_address1) { 
                          case '35.0.':
                             switch ($client_ip_address) {
                                case '35.0.127.52':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                       }
                       break; // break ip address 0
                    case '37':
                       switch ($client_ip_address1) { 
                          case '37.0.':
                             switch ($client_ip_address) {
                                case '37.0.127.44':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '37.48.':
                             switch ($client_ip_address) {
                                case '37.48.80.101':
                                   $bIPIsTor = True;
                                   break;
                                case '37.48.81.27':
                                   $bIPIsTor = True;
                                   break;
                                case '37.48.101.193':
                                   $bIPIsTor = True;
                                   break;
                                case '37.48.115.224':
                                   $bIPIsTor = True;
                                   break;
                                case '37.48.120.196':
                                   $bIPIsTor = True;
                                   break;
                                case '37.48.124.117':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '37.49.':
                             switch ($client_ip_address) {
                                case '37.49.226.236':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '37.58.':
                             switch ($client_ip_address) {
                                case '37.58.52.30':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '37.59.':
                             switch ($client_ip_address) {
                                case '37.59.14.201':
                                   $bIPIsTor = True;
                                   break;
                                case '37.59.63.190':
                                   $bIPIsTor = True;
                                   break;
                                case '37.59.97.134':
                                   $bIPIsTor = True;
                                   break;
                                case '37.59.112.7':
                                   $bIPIsTor = True;
                                   break;
                                case '37.59.123.142':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '37.112.':
                             switch ($client_ip_address) {
                                case '37.112.187.170':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '37.123.':
                             switch ($client_ip_address) {
                                case '37.123.131.14':
                                   $bIPIsTor = True;
                                   break;
                                case '37.123.132.240':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '37.130.':
                             switch ($client_ip_address) {
                                case '37.130.227.133':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '37.134.':
                             switch ($client_ip_address) {
                                case '37.134.41.23':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '37.147.':
                             switch ($client_ip_address) {
                                case '37.147.195.221':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '37.148.':
                             switch ($client_ip_address) {
                                case '37.148.157.183':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '37.187.':
                             switch ($client_ip_address) {
                                case '37.187.7.74':
                                   $bIPIsTor = True;
                                   break;
                                case '37.187.19.140':
                                   $bIPIsTor = True;
                                   break;
                                case '37.187.114.36':
                                   $bIPIsTor = True;
                                   break;
                                case '37.187.129.166':
                                   $bIPIsTor = True;
                                   break;
                                case '37.187.176.64':
                                   $bIPIsTor = True;
                                   break;
                                case '37.187.239.8':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '37.218.':
                             switch ($client_ip_address) {
                                case '37.218.240.101':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '37.220.':
                             switch ($client_ip_address) {
                                case '37.220.35.202':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '37.229.':
                             switch ($client_ip_address) {
                                case '37.229.217.67':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '37.233.':
                             switch ($client_ip_address) {
                                case '37.233.99.157':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                       }
                       break; // break ip address 0
                 }
                 break; // break second number
              case '04': // case second number
                 switch ($client_ip_address0) { 
                    case '40':
                       switch ($client_ip_address1) { 
                          case '40.76.':
                             switch ($client_ip_address) {
                                case '40.76.65.92':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '40.112.':
                             switch ($client_ip_address) {
                                case '40.112.254.22':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                       }
                       break; // break ip address 0
                    case '41':
                       switch ($client_ip_address1) { 
                          case '41.78.':
                             switch ($client_ip_address) {
                                case '41.78.128.134':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '41.212.':
                             switch ($client_ip_address) {
                                case '41.212.37.123':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '41.223.':
                             switch ($client_ip_address) {
                                case '41.223.53.141':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                       }
                       break; // break ip address 0
                    case '45':
                       switch ($client_ip_address1) { 
                          case '45.32.':
                             switch ($client_ip_address) {
                                case '45.32.155.33':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '45.33.':
                             switch ($client_ip_address) {
                                case '45.33.48.204':
                                   $bIPIsTor = True;
                                   break;
                                case '45.33.56.103':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '45.34.':
                             switch ($client_ip_address) {
                                case '45.34.14.133':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '45.55.':
                             switch ($client_ip_address) {
                                case '45.55.170.65':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '45.56.':
                             switch ($client_ip_address) {
                                case '45.56.82.185':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '45.79.':
                             switch ($client_ip_address) {
                                case '45.79.207.176':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                       }
                       break; // break ip address 0
                    case '46':
                       switch ($client_ip_address1) { 
                          case '46.4.':
                             switch ($client_ip_address) {
                                case '46.4.55.177':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '46.10.':
                             switch ($client_ip_address) {
                                case '46.10.10.139':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '46.16.':
                             switch ($client_ip_address) {
                                case '46.16.234.131':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '46.20.':
                             switch ($client_ip_address) {
                                case '46.20.1.98':
                                   $bIPIsTor = True;
                                   break;
                                case '46.20.13.195':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '46.21.':
                             switch ($client_ip_address) {
                                case '46.21.107.230':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '46.28.':
                             switch ($client_ip_address) {
                                case '46.28.68.158':
                                   $bIPIsTor = True;
                                   break;
                                case '46.28.110.136':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '46.29.':
                             switch ($client_ip_address) {
                                case '46.29.248.238':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '46.32.':
                             switch ($client_ip_address) {
                                case '46.32.232.238':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '46.39.':
                             switch ($client_ip_address) {
                                case '46.39.102.250':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '46.72.':
                             switch ($client_ip_address) {
                                case '46.72.71.147':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '46.105.':
                             switch ($client_ip_address) {
                                case '46.105.61.142':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '46.116.':
                             switch ($client_ip_address) {
                                case '46.116.210.232':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '46.119.':
                             switch ($client_ip_address) {
                                case '46.119.67.150':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '46.148.':
                             switch ($client_ip_address) {
                                case '46.148.18.34':
                                   $bIPIsTor = True;
                                   break;
                                case '46.148.18.74':
                                   $bIPIsTor = True;
                                   break;
                                case '46.148.26.71':
                                   $bIPIsTor = True;
                                   break;
                                case '46.148.26.78':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '46.162.':
                             switch ($client_ip_address) {
                                case '46.162.192.166':
                                   $bIPIsTor = True;
                                   break;
                                case '46.162.192.182':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '46.165.':
                             switch ($client_ip_address) {
                                case '46.165.208.203':
                                   $bIPIsTor = True;
                                   break;
                                case '46.165.223.217':
                                   $bIPIsTor = True;
                                   break;
                                case '46.165.230.5':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '46.166.':
                             switch ($client_ip_address) {
                                case '46.166.170.3':
                                   $bIPIsTor = True;
                                   break;
                                case '46.166.170.6':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '46.167.':
                             switch ($client_ip_address) {
                                case '46.167.245.51':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '46.182.':
                             switch ($client_ip_address) {
                                case '46.182.18.111':
                                   $bIPIsTor = True;
                                   break;
                                case '46.182.106.190':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '46.183.':
                             switch ($client_ip_address) {
                                case '46.183.221.231':
                                   $bIPIsTor = True;
                                   break;
                                case '46.183.222.171':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '46.226.':
                             switch ($client_ip_address) {
                                case '46.226.108.26':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '46.233.':
                             switch ($client_ip_address) {
                                case '46.233.0.70':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '46.235.':
                             switch ($client_ip_address) {
                                case '46.235.226.226':
                                   $bIPIsTor = True;
                                   break;
                                case '46.235.227.70':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '46.242.':
                             switch ($client_ip_address) {
                                case '46.242.66.240':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '46.246.':
                             switch ($client_ip_address) {
                                case '46.246.43.36':
                                   $bIPIsTor = True;
                                   break;
                                case '46.246.81.123':
                                   $bIPIsTor = True;
                                   break;
                                case '46.246.93.70':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '46.249.':
                             switch ($client_ip_address) {
                                case '46.249.37.143':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                       }
                       break; // break ip address 0
                 }
                 break; // break second number
              case '05': // case second number
                 switch ($client_ip_address0) { 
                    case '50':
                       switch ($client_ip_address1) { 
                          case '50.7.':
                             switch ($client_ip_address) {
                                case '50.7.124.243':
                                   $bIPIsTor = True;
                                   break;
                                case '50.7.178.100':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '50.76.':
                             switch ($client_ip_address) {
                                case '50.76.159.218':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '50.245.':
                             switch ($client_ip_address) {
                                case '50.245.124.131':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '50.247.':
                             switch ($client_ip_address) {
                                case '50.247.195.124':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '50.253.':
                             switch ($client_ip_address) {
                                case '50.253.127.139':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                       }
                       break; // break ip address 0
                    case '51':
                       switch ($client_ip_address1) { 
                          case '51.174.':
                             switch ($client_ip_address) {
                                case '51.174.220.66':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '51.254.':
                             switch ($client_ip_address) {
                                case '51.254.244.152':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '51.255.':
                             switch ($client_ip_address) {
                                case '51.255.33.216':
                                   $bIPIsTor = True;
                                   break;
                                case '51.255.38.230':
                                   $bIPIsTor = True;
                                   break;
                                case '51.255.38.231':
                                   $bIPIsTor = True;
                                   break;
                                case '51.255.202.66':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                       }
                       break; // break ip address 0
                    case '52':
                       switch ($client_ip_address1) { 
                          case '52.0.':
                             switch ($client_ip_address) {
                                case '52.0.4.72':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '52.5.':
                             switch ($client_ip_address) {
                                case '52.5.66.9':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '52.10.':
                             switch ($client_ip_address) {
                                case '52.10.36.66':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '52.16.':
                             switch ($client_ip_address) {
                                case '52.16.183.9':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                       }
                       break; // break ip address 0
                    case '54':
                       switch ($client_ip_address1) { 
                          case '54.67.':
                             switch ($client_ip_address) {
                                case '54.67.32.244':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '54.68.':
                             switch ($client_ip_address) {
                                case '54.68.29.170':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '54.88.':
                             switch ($client_ip_address) {
                                case '54.88.228.147':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                       }
                       break; // break ip address 0
                    case '59':
                       switch ($client_ip_address1) { 
                          case '59.127.':
                             switch ($client_ip_address) {
                                case '59.127.163.155':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '59.177.':
                             switch ($client_ip_address) {
                                case '59.177.78.10':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '59.179.':
                             switch ($client_ip_address) {
                                case '59.179.17.195':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                       }
                       break; // break ip address 0
                 }
                 break; // break second number
              case '06': // case second number
                 switch ($client_ip_address0) { 
                    case '60':
                       switch ($client_ip_address1) { 
                          case '60.248.':
                             switch ($client_ip_address) {
                                case '60.248.162.179':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                       }
                       break; // break ip address 0
                    case '61':
                       switch ($client_ip_address1) { 
                          case '61.230.':
                             switch ($client_ip_address) {
                                case '61.230.104.246':
                                   $bIPIsTor = True;
                                   break;
                                case '61.230.117.76':
                                   $bIPIsTor = True;
                                   break;
                                case '61.230.136.214':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                       }
                       break; // break ip address 0
                    case '62':
                       switch ($client_ip_address1) { 
                          case '62.75.':
                             switch ($client_ip_address) {
                                case '62.75.145.28':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '62.102.':
                             switch ($client_ip_address) {
                                case '62.102.148.67':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '62.133.':
                             switch ($client_ip_address) {
                                case '62.133.130.105':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '62.141.':
                             switch ($client_ip_address) {
                                case '62.141.55.117':
                                   $bIPIsTor = True;
                                   break;
                                case '62.141.120.218':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '62.149.':
                             switch ($client_ip_address) {
                                case '62.149.12.153':
                                   $bIPIsTor = True;
                                   break;
                                case '62.149.25.15':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '62.198.':
                             switch ($client_ip_address) {
                                case '62.198.122.172':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '62.205.':
                             switch ($client_ip_address) {
                                case '62.205.133.251':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '62.210.':
                             switch ($client_ip_address) {
                                case '62.210.37.82':
                                   $bIPIsTor = True;
                                   break;
                                case '62.210.105.116':
                                   $bIPIsTor = True;
                                   break;
                                case '62.210.129.246':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '62.212.':
                             switch ($client_ip_address) {
                                case '62.212.73.141':
                                   $bIPIsTor = True;
                                   break;
                                case '62.212.84.229':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '62.218.':
                             switch ($client_ip_address) {
                                case '62.218.77.122':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                       }
                       break; // break ip address 0
                    case '63':
                       switch ($client_ip_address1) { 
                          case '63.223.':
                             switch ($client_ip_address) {
                                case '63.223.69.103':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                       }
                       break; // break ip address 0
                    case '64':
                       switch ($client_ip_address1) { 
                          case '64.18.':
                             switch ($client_ip_address) {
                                case '64.18.82.164':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '64.113.':
                             switch ($client_ip_address) {
                                case '64.113.32.29':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '64.187.':
                             switch ($client_ip_address) {
                                case '64.187.167.228':
                                   $bIPIsTor = True;
                                   break;
                                case '64.187.226.244':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                       }
                       break; // break ip address 0
                    case '65':
                       switch ($client_ip_address1) { 
                          case '65.19.':
                             switch ($client_ip_address) {
                                case '65.19.167.130':
                                   $bIPIsTor = True;
                                   break;
                                case '65.19.167.131':
                                   $bIPIsTor = True;
                                   break;
                                case '65.19.167.132':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '65.52.':
                             switch ($client_ip_address) {
                                case '65.52.150.162':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '65.181.':
                             switch ($client_ip_address) {
                                case '65.181.112.128':
                                   $bIPIsTor = True;
                                   break;
                                case '65.181.118.10':
                                   $bIPIsTor = True;
                                   break;
                                case '65.181.123.254':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '65.183.':
                             switch ($client_ip_address) {
                                case '65.183.154.104':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                       }
                       break; // break ip address 0
                    case '66':
                       switch ($client_ip_address1) { 
                          case '66.85.':
                             switch ($client_ip_address) {
                                case '66.85.131.72':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '66.180.':
                             switch ($client_ip_address) {
                                case '66.180.193.219':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                       }
                       break; // break ip address 0
                    case '67':
                       switch ($client_ip_address1) { 
                          case '67.1.':
                             switch ($client_ip_address) {
                                case '67.1.129.85':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '67.55.':
                             switch ($client_ip_address) {
                                case '67.55.115.100':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '67.215.':
                             switch ($client_ip_address) {
                                case '67.215.255.140':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                       }
                       break; // break ip address 0
                    case '68':
                       switch ($client_ip_address1) { 
                          case '68.71.':
                             switch ($client_ip_address) {
                                case '68.71.46.138':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '68.233.':
                             switch ($client_ip_address) {
                                case '68.233.235.217':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                       }
                       break; // break ip address 0
                    case '69':
                       switch ($client_ip_address1) { 
                          case '69.161.':
                             switch ($client_ip_address) {
                                case '69.161.93.80':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '69.162.':
                             switch ($client_ip_address) {
                                case '69.162.139.9':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '69.164.':
                             switch ($client_ip_address) {
                                case '69.164.207.234':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '69.172.':
                             switch ($client_ip_address) {
                                case '69.172.229.199':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '69.195.':
                             switch ($client_ip_address) {
                                case '69.195.159.94':
                                   $bIPIsTor = True;
                                   break;
                                case '69.195.159.138':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                       }
                       break; // break ip address 0
                 }
                 break; // break second number
              case '07': // case second number
                 switch ($client_ip_address0) { 
                    case '70':
                       switch ($client_ip_address1) { 
                          case '70.164.':
                             switch ($client_ip_address) {
                                case '70.164.255.174':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                       }
                       break; // break ip address 0
                    case '71':
                       switch ($client_ip_address1) { 
                          case '71.10.':
                             switch ($client_ip_address) {
                                case '71.10.139.137':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '71.19.':
                             switch ($client_ip_address) {
                                case '71.19.157.127':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '71.59.':
                             switch ($client_ip_address) {
                                case '71.59.241.70':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '71.70.':
                             switch ($client_ip_address) {
                                case '71.70.229.92':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '71.135.':
                             switch ($client_ip_address) {
                                case '71.135.37.196':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '71.163.':
                             switch ($client_ip_address) {
                                case '71.163.40.225':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                       }
                       break; // break ip address 0
                    case '72':
                       switch ($client_ip_address1) { 
                          case '72.14.':
                             switch ($client_ip_address) {
                                case '72.14.179.10':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '72.52.':
                             switch ($client_ip_address) {
                                case '72.52.75.27':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                       }
                       break; // break ip address 0
                    case '73':
                       switch ($client_ip_address1) { 
                          case '73.172.':
                             switch ($client_ip_address) {
                                case '73.172.157.202':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                       }
                       break; // break ip address 0
                    case '74':
                       switch ($client_ip_address1) { 
                          case '74.50.':
                             switch ($client_ip_address) {
                                case '74.50.54.68':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '74.122.':
                             switch ($client_ip_address) {
                                case '74.122.198.101':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '74.142.':
                             switch ($client_ip_address) {
                                case '74.142.74.156':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '74.207.':
                             switch ($client_ip_address) {
                                case '74.207.248.110':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                       }
                       break; // break ip address 0
                    case '75':
                       switch ($client_ip_address1) { 
                          case '75.173.':
                             switch ($client_ip_address) {
                                case '75.173.68.148':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                       }
                       break; // break ip address 0
                    case '76':
                       switch ($client_ip_address1) { 
                          case '76.85.':
                             switch ($client_ip_address) {
                                case '76.85.207.212':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                       }
                       break; // break ip address 0
                    case '77':
                       switch ($client_ip_address1) { 
                          case '77.37.':
                             switch ($client_ip_address) {
                                case '77.37.218.145':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '77.68.':
                             switch ($client_ip_address) {
                                case '77.68.226.175':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '77.71.':
                             switch ($client_ip_address) {
                                case '77.71.106.201':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '77.81.':
                             switch ($client_ip_address) {
                                case '77.81.104.124':
                                   $bIPIsTor = True;
                                   break;
                                case '77.81.240.41':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '77.93.':
                             switch ($client_ip_address) {
                                case '77.93.203.34':
                                   $bIPIsTor = True;
                                   break;
                                case '77.93.203.35':
                                   $bIPIsTor = True;
                                   break;
                                case '77.93.203.156':
                                   $bIPIsTor = True;
                                   break;
                                case '77.93.203.171':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '77.102.':
                             switch ($client_ip_address) {
                                case '77.102.66.134':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '77.109.':
                             switch ($client_ip_address) {
                                case '77.109.117.66':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '77.170.':
                             switch ($client_ip_address) {
                                case '77.170.230.163':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '77.182.':
                             switch ($client_ip_address) {
                                case '77.182.196.112':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '77.247.':
                             switch ($client_ip_address) {
                                case '77.247.181.162':
                                   $bIPIsTor = True;
                                   break;
                                case '77.247.181.163':
                                   $bIPIsTor = True;
                                   break;
                                case '77.247.181.165':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                       }
                       break; // break ip address 0
                    case '78':
                       switch ($client_ip_address1) { 
                          case '78.24.':
                             switch ($client_ip_address) {
                                case '78.24.223.132':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '78.41.':
                             switch ($client_ip_address) {
                                case '78.41.115.145':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '78.42.':
                             switch ($client_ip_address) {
                                case '78.42.236.16':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '78.46.':
                             switch ($client_ip_address) {
                                case '78.46.92.35':
                                   $bIPIsTor = True;
                                   break;
                                case '78.46.120.80':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '78.66.':
                             switch ($client_ip_address) {
                                case '78.66.111.35':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '78.70.':
                             switch ($client_ip_address) {
                                case '78.70.160.25':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '78.107.':
                             switch ($client_ip_address) {
                                case '78.107.237.16':
                                   $bIPIsTor = True;
                                   break;
                                case '78.107.240.9':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '78.128.':
                             switch ($client_ip_address) {
                                case '78.128.40.89':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '78.142.':
                             switch ($client_ip_address) {
                                case '78.142.19.59':
                                   $bIPIsTor = True;
                                   break;
                                case '78.142.175.70':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '78.193.':
                             switch ($client_ip_address) {
                                case '78.193.86.3':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '78.247.':
                             switch ($client_ip_address) {
                                case '78.247.15.126':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                       }
                       break; // break ip address 0
                    case '79':
                       switch ($client_ip_address1) { 
                          case '79.98.':
                             switch ($client_ip_address) {
                                case '79.98.107.90':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '79.134.':
                             switch ($client_ip_address) {
                                case '79.134.255.200':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '79.136.':
                             switch ($client_ip_address) {
                                case '79.136.42.226':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '79.172.':
                             switch ($client_ip_address) {
                                case '79.172.193.32':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '79.197.':
                             switch ($client_ip_address) {
                                case '79.197.207.38':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '79.200.':
                             switch ($client_ip_address) {
                                case '79.200.239.69':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '79.219.':
                             switch ($client_ip_address) {
                                case '79.219.252.71':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                       }
                       break; // break ip address 0
                 }
                 break; // break second number
              case '08': // case second number
                 switch ($client_ip_address0) { 
                    case '80':
                       switch ($client_ip_address1) { 
                          case '80.57.':
                             switch ($client_ip_address) {
                                case '80.57.206.190':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '80.79.':
                             switch ($client_ip_address) {
                                case '80.79.23.7':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '80.110.':
                             switch ($client_ip_address) {
                                case '80.110.190.147':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '80.139.':
                             switch ($client_ip_address) {
                                case '80.139.168.62':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '80.162.':
                             switch ($client_ip_address) {
                                case '80.162.0.113':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '80.169.':
                             switch ($client_ip_address) {
                                case '80.169.241.76':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '80.240.':
                             switch ($client_ip_address) {
                                case '80.240.139.111':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '80.241.':
                             switch ($client_ip_address) {
                                case '80.241.60.207':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '80.248.':
                             switch ($client_ip_address) {
                                case '80.248.208.131':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                       }
                       break; // break ip address 0
                    case '81':
                       switch ($client_ip_address1) { 
                          case '81.2.':
                             switch ($client_ip_address) {
                                case '81.2.242.62':
                                   $bIPIsTor = True;
                                   break;
                                case '81.2.245.158':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '81.5.':
                             switch ($client_ip_address) {
                                case '81.5.112.46':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '81.7.':
                             switch ($client_ip_address) {
                                case '81.7.11.70':
                                   $bIPIsTor = True;
                                   break;
                                case '81.7.15.115':
                                   $bIPIsTor = True;
                                   break;
                                case '81.7.17.171':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '81.89.':
                             switch ($client_ip_address) {
                                case '81.89.0.195':
                                   $bIPIsTor = True;
                                   break;
                                case '81.89.0.196':
                                   $bIPIsTor = True;
                                   break;
                                case '81.89.0.197':
                                   $bIPIsTor = True;
                                   break;
                                case '81.89.0.198':
                                   $bIPIsTor = True;
                                   break;
                                case '81.89.0.199':
                                   $bIPIsTor = True;
                                   break;
                                case '81.89.0.200':
                                   $bIPIsTor = True;
                                   break;
                                case '81.89.0.201':
                                   $bIPIsTor = True;
                                   break;
                                case '81.89.0.202':
                                   $bIPIsTor = True;
                                   break;
                                case '81.89.0.203':
                                   $bIPIsTor = True;
                                   break;
                                case '81.89.0.204':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '81.102.':
                             switch ($client_ip_address) {
                                case '81.102.198.81':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '81.176.':
                             switch ($client_ip_address) {
                                case '81.176.228.54':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '81.191.':
                             switch ($client_ip_address) {
                                case '81.191.240.34':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '81.242.':
                             switch ($client_ip_address) {
                                case '81.242.89.57':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                       }
                       break; // break ip address 0
                    case '82':
                       switch ($client_ip_address1) { 
                          case '82.6.':
                             switch ($client_ip_address) {
                                case '82.6.4.9':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '82.66.':
                             switch ($client_ip_address) {
                                case '82.66.140.131':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '82.69.':
                             switch ($client_ip_address) {
                                case '82.69.50.50':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '82.94.':
                             switch ($client_ip_address) {
                                case '82.94.251.227':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '82.116.':
                             switch ($client_ip_address) {
                                case '82.116.120.3':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '82.119.':
                             switch ($client_ip_address) {
                                case '82.119.18.62':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '82.128.':
                             switch ($client_ip_address) {
                                case '82.128.249.249':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '82.161.':
                             switch ($client_ip_address) {
                                case '82.161.210.87':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '82.196.':
                             switch ($client_ip_address) {
                                case '82.196.10.134':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '82.211.':
                             switch ($client_ip_address) {
                                case '82.211.0.201':
                                   $bIPIsTor = True;
                                   break;
                                case '82.211.19.143':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '82.221.':
                             switch ($client_ip_address) {
                                case '82.221.129.96':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '82.228.':
                             switch ($client_ip_address) {
                                case '82.228.252.20':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '82.248.':
                             switch ($client_ip_address) {
                                case '82.248.49.205':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                       }
                       break; // break ip address 0
                    case '83':
                       switch ($client_ip_address1) { 
                          case '83.163.':
                             switch ($client_ip_address) {
                                case '83.163.9.80':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '83.220.':
                             switch ($client_ip_address) {
                                case '83.220.169.176':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '83.227.':
                             switch ($client_ip_address) {
                                case '83.227.52.174':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '83.233.':
                             switch ($client_ip_address) {
                                case '83.233.119.138':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '83.238.':
                             switch ($client_ip_address) {
                                case '83.238.163.214':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                       }
                       break; // break ip address 0
                    case '84':
                       switch ($client_ip_address1) { 
                          case '84.3.':
                             switch ($client_ip_address) {
                                case '84.3.0.53':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '84.10.':
                             switch ($client_ip_address) {
                                case '84.10.161.99':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '84.19.':
                             switch ($client_ip_address) {
                                case '84.19.179.229':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '84.45.':
                             switch ($client_ip_address) {
                                case '84.45.76.10':
                                   $bIPIsTor = True;
                                   break;
                                case '84.45.76.11':
                                   $bIPIsTor = True;
                                   break;
                                case '84.45.76.12':
                                   $bIPIsTor = True;
                                   break;
                                case '84.45.76.13':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '84.48.':
                             switch ($client_ip_address) {
                                case '84.48.199.78':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '84.53.':
                             switch ($client_ip_address) {
                                case '84.53.232.154':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '84.57.':
                             switch ($client_ip_address) {
                                case '84.57.215.95':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '84.92.':
                             switch ($client_ip_address) {
                                case '84.92.24.214':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '84.194.':
                             switch ($client_ip_address) {
                                case '84.194.92.197':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '84.215.':
                             switch ($client_ip_address) {
                                case '84.215.131.93':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '84.234.':
                             switch ($client_ip_address) {
                                case '84.234.221.122':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '84.251.':
                             switch ($client_ip_address) {
                                case '84.251.72.110':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '84.255.':
                             switch ($client_ip_address) {
                                case '84.255.239.131':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                       }
                       break; // break ip address 0
                    case '85':
                       switch ($client_ip_address1) { 
                          case '85.10.':
                             switch ($client_ip_address) {
                                case '85.10.210.199':
                                   $bIPIsTor = True;
                                   break;
                                case '85.10.211.53':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '85.17.':
                             switch ($client_ip_address) {
                                case '85.17.177.73':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '85.23.':
                             switch ($client_ip_address) {
                                case '85.23.243.147':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '85.24.':
                             switch ($client_ip_address) {
                                case '85.24.215.117':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '85.25.':
                             switch ($client_ip_address) {
                                case '85.25.44.141':
                                   $bIPIsTor = True;
                                   break;
                                case '85.25.103.12':
                                   $bIPIsTor = True;
                                   break;
                                case '85.25.211.101':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '85.93.':
                             switch ($client_ip_address) {
                                case '85.93.18.64':
                                   $bIPIsTor = True;
                                   break;
                                case '85.93.218.204':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '85.119.':
                             switch ($client_ip_address) {
                                case '85.119.83.158':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '85.140.':
                             switch ($client_ip_address) {
                                case '85.140.203.136':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '85.143.':
                             switch ($client_ip_address) {
                                case '85.143.95.50':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '85.144.':
                             switch ($client_ip_address) {
                                case '85.144.220.247':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '85.158.':
                             switch ($client_ip_address) {
                                case '85.158.152.122':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '85.214.':
                             switch ($client_ip_address) {
                                case '85.214.11.209':
                                   $bIPIsTor = True;
                                   break;
                                case '85.214.98.239':
                                   $bIPIsTor = True;
                                   break;
                                case '85.214.155.116':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '85.248.':
                             switch ($client_ip_address) {
                                case '85.248.227.163':
                                   $bIPIsTor = True;
                                   break;
                                case '85.248.227.164':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                       }
                       break; // break ip address 0
                    case '86':
                       switch ($client_ip_address1) { 
                          case '86.11.':
                             switch ($client_ip_address) {
                                case '86.11.185.52':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '86.56.':
                             switch ($client_ip_address) {
                                case '86.56.175.82':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '86.165.':
                             switch ($client_ip_address) {
                                case '86.165.180.196':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '86.166.':
                             switch ($client_ip_address) {
                                case '86.166.89.62':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '86.192.':
                             switch ($client_ip_address) {
                                case '86.192.231.233':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '86.253.':
                             switch ($client_ip_address) {
                                case '86.253.25.163':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                       }
                       break; // break ip address 0
                    case '87':
                       switch ($client_ip_address1) { 
                          case '87.81.':
                             switch ($client_ip_address) {
                                case '87.81.139.118':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '87.98.':
                             switch ($client_ip_address) {
                                case '87.98.178.61':
                                   $bIPIsTor = True;
                                   break;
                                case '87.98.250.222':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '87.106.':
                             switch ($client_ip_address) {
                                case '87.106.147.161':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '87.115.':
                             switch ($client_ip_address) {
                                case '87.115.244.129':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '87.118.':
                             switch ($client_ip_address) {
                                case '87.118.84.181':
                                   $bIPIsTor = True;
                                   break;
                                case '87.118.91.140':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '87.120.':
                             switch ($client_ip_address) {
                                case '87.120.37.14':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '87.236.':
                             switch ($client_ip_address) {
                                case '87.236.195.185':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '87.252.':
                             switch ($client_ip_address) {
                                case '87.252.5.163':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                       }
                       break; // break ip address 0
                    case '88':
                       switch ($client_ip_address1) { 
                          case '88.77.':
                             switch ($client_ip_address) {
                                case '88.77.188.43':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '88.156.':
                             switch ($client_ip_address) {
                                case '88.156.197.161':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '88.161.':
                             switch ($client_ip_address) {
                                case '88.161.203.46':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '88.190.':
                             switch ($client_ip_address) {
                                case '88.190.118.95':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '88.198.':
                             switch ($client_ip_address) {
                                case '88.198.14.171':
                                   $bIPIsTor = True;
                                   break;
                                case '88.198.56.140':
                                   $bIPIsTor = True;
                                   break;
                                case '88.198.253.13':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '88.212.':
                             switch ($client_ip_address) {
                                case '88.212.208.148':
                                   $bIPIsTor = True;
                                   break;
                                case '88.212.209.62':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                       }
                       break; // break ip address 0
                    case '89':
                       switch ($client_ip_address1) { 
                          case '89.18.':
                             switch ($client_ip_address) {
                                case '89.18.174.19':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '89.31.':
                             switch ($client_ip_address) {
                                case '89.31.96.168':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '89.34.':
                             switch ($client_ip_address) {
                                case '89.34.26.126':
                                   $bIPIsTor = True;
                                   break;
                                case '89.34.237.12':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '89.46.':
                             switch ($client_ip_address) {
                                case '89.46.100.13':
                                   $bIPIsTor = True;
                                   break;
                                case '89.46.100.182':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '89.67.':
                             switch ($client_ip_address) {
                                case '89.67.77.136':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '89.72.':
                             switch ($client_ip_address) {
                                case '89.72.44.205':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '89.140.':
                             switch ($client_ip_address) {
                                case '89.140.119.69':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '89.163.':
                             switch ($client_ip_address) {
                                case '89.163.220.14':
                                   $bIPIsTor = True;
                                   break;
                                case '89.163.225.207':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '89.187.':
                             switch ($client_ip_address) {
                                case '89.187.142.208':
                                   $bIPIsTor = True;
                                   break;
                                case '89.187.144.122':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '89.218.':
                             switch ($client_ip_address) {
                                case '89.218.16.7':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '89.234.':
                             switch ($client_ip_address) {
                                case '89.234.157.254':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '89.238.':
                             switch ($client_ip_address) {
                                case '89.238.77.4':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                       }
                       break; // break ip address 0
                 }
                 break; // break second number
              case '09': // case second number
                 switch ($client_ip_address0) { 
                    case '90':
                       switch ($client_ip_address1) { 
                          case '90.146.':
                             switch ($client_ip_address) {
                                case '90.146.134.80':
                                   $bIPIsTor = True;
                                   break;
                                case '90.146.247.72':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '90.148.':
                             switch ($client_ip_address) {
                                case '90.148.43.208':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '90.182.':
                             switch ($client_ip_address) {
                                case '90.182.235.46':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '90.224.':
                             switch ($client_ip_address) {
                                case '90.224.68.51':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '90.231.':
                             switch ($client_ip_address) {
                                case '90.231.152.159':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                       }
                       break; // break ip address 0
                    case '91':
                       switch ($client_ip_address1) { 
                          case '91.82.':
                             switch ($client_ip_address) {
                                case '91.82.237.127':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '91.109.':
                             switch ($client_ip_address) {
                                case '91.109.29.120':
                                   $bIPIsTor = True;
                                   break;
                                case '91.109.247.173':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '91.121.':
                             switch ($client_ip_address) {
                                case '91.121.21.224':
                                   $bIPIsTor = True;
                                   break;
                                case '91.121.66.121':
                                   $bIPIsTor = True;
                                   break;
                                case '91.121.192.154':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '91.138.':
                             switch ($client_ip_address) {
                                case '91.138.4.11':
                                   $bIPIsTor = True;
                                   break;
                                case '91.138.5.145':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '91.146.':
                             switch ($client_ip_address) {
                                case '91.146.121.3':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '91.196.':
                             switch ($client_ip_address) {
                                case '91.196.50.121':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '91.199.':
                             switch ($client_ip_address) {
                                case '91.199.149.139':
                                   $bIPIsTor = True;
                                   break;
                                case '91.199.197.76':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '91.203.':
                             switch ($client_ip_address) {
                                case '91.203.5.165':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '91.213.':
                             switch ($client_ip_address) {
                                case '91.213.8.64':
                                   $bIPIsTor = True;
                                   break;
                                case '91.213.8.84':
                                   $bIPIsTor = True;
                                   break;
                                case '91.213.8.235':
                                   $bIPIsTor = True;
                                   break;
                                case '91.213.8.236':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '91.219.':
                             switch ($client_ip_address) {
                                case '91.219.236.218':
                                   $bIPIsTor = True;
                                   break;
                                case '91.219.236.222':
                                   $bIPIsTor = True;
                                   break;
                                case '91.219.236.232':
                                   $bIPIsTor = True;
                                   break;
                                case '91.219.237.229':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '91.220.':
                             switch ($client_ip_address) {
                                case '91.220.220.5':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '91.226.':
                             switch ($client_ip_address) {
                                case '91.226.212.160':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '91.229.':
                             switch ($client_ip_address) {
                                case '91.229.77.64':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '91.231.':
                             switch ($client_ip_address) {
                                case '91.231.86.101':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '91.233.':
                             switch ($client_ip_address) {
                                case '91.233.106.121':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '91.234.':
                             switch ($client_ip_address) {
                                case '91.234.226.35':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '91.250.':
                             switch ($client_ip_address) {
                                case '91.250.241.241':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                       }
                       break; // break ip address 0
                    case '92':
                       switch ($client_ip_address1) { 
                          case '92.195.':
                             switch ($client_ip_address) {
                                case '92.195.5.234':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '92.221.':
                             switch ($client_ip_address) {
                                case '92.221.62.34':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '92.222.':
                             switch ($client_ip_address) {
                                case '92.222.6.12':
                                   $bIPIsTor = True;
                                   break;
                                case '92.222.22.113':
                                   $bIPIsTor = True;
                                   break;
                                case '92.222.25.220':
                                   $bIPIsTor = True;
                                   break;
                                case '92.222.103.234':
                                   $bIPIsTor = True;
                                   break;
                                case '92.222.127.101':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '92.243.':
                             switch ($client_ip_address) {
                                case '92.243.69.105':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '92.245.':
                             switch ($client_ip_address) {
                                case '92.245.194.234':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '92.248.':
                             switch ($client_ip_address) {
                                case '92.248.180.51':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                       }
                       break; // break ip address 0
                    case '93':
                       switch ($client_ip_address1) { 
                          case '93.94.':
                             switch ($client_ip_address) {
                                case '93.94.146.43':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '93.99.':
                             switch ($client_ip_address) {
                                case '93.99.206.161':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '93.113.':
                             switch ($client_ip_address) {
                                case '93.113.36.242':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '93.115.':
                             switch ($client_ip_address) {
                                case '93.115.95.201':
                                   $bIPIsTor = True;
                                   break;
                                case '93.115.95.202':
                                   $bIPIsTor = True;
                                   break;
                                case '93.115.95.204':
                                   $bIPIsTor = True;
                                   break;
                                case '93.115.95.205':
                                   $bIPIsTor = True;
                                   break;
                                case '93.115.95.206':
                                   $bIPIsTor = True;
                                   break;
                                case '93.115.95.207':
                                   $bIPIsTor = True;
                                   break;
                                case '93.115.95.216':
                                   $bIPIsTor = True;
                                   break;
                                case '93.115.241.2':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '93.129.':
                             switch ($client_ip_address) {
                                case '93.129.10.90':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '93.174.':
                             switch ($client_ip_address) {
                                case '93.174.89.138':
                                   $bIPIsTor = True;
                                   break;
                                case '93.174.90.30':
                                   $bIPIsTor = True;
                                   break;
                                case '93.174.93.133':
                                   $bIPIsTor = True;
                                   break;
                                case '93.174.93.154':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '93.184.':
                             switch ($client_ip_address) {
                                case '93.184.66.227':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '93.190.':
                             switch ($client_ip_address) {
                                case '93.190.139.213':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '93.211.':
                             switch ($client_ip_address) {
                                case '93.211.239.214':
                                   $bIPIsTor = True;
                                   break;
                                case '93.211.252.64':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '93.230.':
                             switch ($client_ip_address) {
                                case '93.230.176.119':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                       }
                       break; // break ip address 0
                    case '94':
                       switch ($client_ip_address1) { 
                          case '94.23.':
                             switch ($client_ip_address) {
                                case '94.23.252.31':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '94.26.':
                             switch ($client_ip_address) {
                                case '94.26.85.19':
                                   $bIPIsTor = True;
                                   break;
                                case '94.26.140.150':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '94.51.':
                             switch ($client_ip_address) {
                                case '94.51.13.222':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '94.102.':
                             switch ($client_ip_address) {
                                case '94.102.53.177':
                                   $bIPIsTor = True;
                                   break;
                                case '94.102.55.15':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '94.103.':
                             switch ($client_ip_address) {
                                case '94.103.175.86':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '94.142.':
                             switch ($client_ip_address) {
                                case '94.142.242.84':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '94.198.':
                             switch ($client_ip_address) {
                                case '94.198.100.17':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '94.199.':
                             switch ($client_ip_address) {
                                case '94.199.51.101':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '94.210.':
                             switch ($client_ip_address) {
                                case '94.210.0.28':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '94.212.':
                             switch ($client_ip_address) {
                                case '94.212.136.118':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '94.223.':
                             switch ($client_ip_address) {
                                case '94.223.15.144':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '94.242.':
                             switch ($client_ip_address) {
                                case '94.242.57.2':
                                   $bIPIsTor = True;
                                   break;
                                case '94.242.57.38':
                                   $bIPIsTor = True;
                                   break;
                                case '94.242.195.186':
                                   $bIPIsTor = True;
                                   break;
                                case '94.242.228.108':
                                   $bIPIsTor = True;
                                   break;
                                case '94.242.246.23':
                                   $bIPIsTor = True;
                                   break;
                                case '94.242.246.24':
                                   $bIPIsTor = True;
                                   break;
                                case '94.242.250.117':
                                   $bIPIsTor = True;
                                   break;
                                case '94.242.253.92':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '94.249.':
                             switch ($client_ip_address) {
                                case '94.249.192.197':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                       }
                       break; // break ip address 0
                    case '95':
                       switch ($client_ip_address1) { 
                          case '95.52.':
                             switch ($client_ip_address) {
                                case '95.52.33.49':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '95.69.':
                             switch ($client_ip_address) {
                                case '95.69.233.211':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '95.71.':
                             switch ($client_ip_address) {
                                case '95.71.114.139':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '95.85.':
                             switch ($client_ip_address) {
                                case '95.85.10.71':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '95.105.':
                             switch ($client_ip_address) {
                                case '95.105.164.157':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '95.128.':
                             switch ($client_ip_address) {
                                case '95.128.43.164':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '95.130.':
                             switch ($client_ip_address) {
                                case '95.130.10.216':
                                   $bIPIsTor = True;
                                   break;
                                case '95.130.11.147':
                                   $bIPIsTor = True;
                                   break;
                                case '95.130.11.155':
                                   $bIPIsTor = True;
                                   break;
                                case '95.130.11.161':
                                   $bIPIsTor = True;
                                   break;
                                case '95.130.12.37':
                                   $bIPIsTor = True;
                                   break;
                                case '95.130.12.91':
                                   $bIPIsTor = True;
                                   break;
                                case '95.130.13.157':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '95.140.':
                             switch ($client_ip_address) {
                                case '95.140.42.183':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '95.142.':
                             switch ($client_ip_address) {
                                case '95.142.161.63':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '95.154.':
                             switch ($client_ip_address) {
                                case '95.154.24.73':
                                   $bIPIsTor = True;
                                   break;
                                case '95.154.88.252':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '95.157.':
                             switch ($client_ip_address) {
                                case '95.157.8.60':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '95.163.':
                             switch ($client_ip_address) {
                                case '95.163.107.9':
                                   $bIPIsTor = True;
                                   break;
                                case '95.163.107.36':
                                   $bIPIsTor = True;
                                   break;
                                case '95.163.107.61':
                                   $bIPIsTor = True;
                                   break;
                                case '95.163.121.131':
                                   $bIPIsTor = True;
                                   break;
                                case '95.163.121.140':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '95.183.':
                             switch ($client_ip_address) {
                                case '95.183.49.224':
                                   $bIPIsTor = True;
                                   break;
                                case '95.183.50.235':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '95.211.':
                             switch ($client_ip_address) {
                                case '95.211.169.35':
                                   $bIPIsTor = True;
                                   break;
                                case '95.211.188.31':
                                   $bIPIsTor = True;
                                   break;
                                case '95.211.188.207':
                                   $bIPIsTor = True;
                                   break;
                                case '95.211.205.151':
                                   $bIPIsTor = True;
                                   break;
                                case '95.211.226.242':
                                   $bIPIsTor = True;
                                   break;
                                case '95.211.226.243':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '95.215.':
                             switch ($client_ip_address) {
                                case '95.215.45.142':
                                   $bIPIsTor = True;
                                   break;
                                case '95.215.46.72':
                                   $bIPIsTor = True;
                                   break;
                                case '95.215.47.107':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '95.223.':
                             switch ($client_ip_address) {
                                case '95.223.204.243':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '95.238.':
                             switch ($client_ip_address) {
                                case '95.238.237.89':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                       }
                       break; // break ip address 0
                    case '96':
                       switch ($client_ip_address1) { 
                          case '96.35.':
                             switch ($client_ip_address) {
                                case '96.35.130.131':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '96.43.':
                             switch ($client_ip_address) {
                                case '96.43.142.28':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '96.45.':
                             switch ($client_ip_address) {
                                case '96.45.183.118':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                       }
                       break; // break ip address 0
                    case '97':
                       switch ($client_ip_address1) { 
                          case '97.74.':
                             switch ($client_ip_address) {
                                case '97.74.237.196':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                       }
                       break; // break ip address 0
                    case '98':
                       switch ($client_ip_address1) { 
                          case '98.116.':
                             switch ($client_ip_address) {
                                case '98.116.166.20':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '98.142.':
                             switch ($client_ip_address) {
                                case '98.142.47.54':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                       }
                       break; // break ip address 0
                 }
                 break; // break second number
           }
           break; // break first number
        case '1':
           switch ($client_ip_address0_second_character) { 
              case '10': // case second number
                 switch ($client_ip_address0) { 
                    case '103':
                       switch ($client_ip_address1) { 
                          case '103.10.':
                             switch ($client_ip_address) {
                                case '103.10.197.50':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '103.41.':
                             switch ($client_ip_address) {
                                case '103.41.177.49':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '103.56.':
                             switch ($client_ip_address) {
                                case '103.56.207.84':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '103.236.':
                             switch ($client_ip_address) {
                                case '103.236.201.110':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '103.240.':
                             switch ($client_ip_address) {
                                case '103.240.91.7':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                       }
                       break; // break ip address 0
                    case '104':
                       switch ($client_ip_address1) { 
                          case '104.40.':
                             switch ($client_ip_address) {
                                case '104.40.1.143':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '104.130.':
                             switch ($client_ip_address) {
                                case '104.130.169.121':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '104.131.':
                             switch ($client_ip_address) {
                                case '104.131.206.23':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '104.167.':
                             switch ($client_ip_address) {
                                case '104.167.99.191':
                                   $bIPIsTor = True;
                                   break;
                                case '104.167.102.244':
                                   $bIPIsTor = True;
                                   break;
                                case '104.167.113.138':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '104.177.':
                             switch ($client_ip_address) {
                                case '104.177.150.65':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '104.192.':
                             switch ($client_ip_address) {
                                case '104.192.0.18':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '104.208.':
                             switch ($client_ip_address) {
                                case '104.208.241.245':
                                   $bIPIsTor = True;
                                   break;
                                case '104.208.247.43':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '104.232.':
                             switch ($client_ip_address) {
                                case '104.232.3.33':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '104.233.':
                             switch ($client_ip_address) {
                                case '104.233.91.12':
                                   $bIPIsTor = True;
                                   break;
                                case '104.233.92.73':
                                   $bIPIsTor = True;
                                   break;
                                case '104.233.103.132':
                                   $bIPIsTor = True;
                                   break;
                                case '104.233.108.86':
                                   $bIPIsTor = True;
                                   break;
                                case '104.233.124.244':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '104.237.':
                             switch ($client_ip_address) {
                                case '104.237.152.195':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '104.245.':
                             switch ($client_ip_address) {
                                case '104.245.233.128':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                       }
                       break; // break ip address 0
                    case '106':
                       switch ($client_ip_address1) { 
                          case '106.185.':
                             switch ($client_ip_address) {
                                case '106.185.49.137':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '106.186.':
                             switch ($client_ip_address) {
                                case '106.186.28.33':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '106.187.':
                             switch ($client_ip_address) {
                                case '106.187.37.101':
                                   $bIPIsTor = True;
                                   break;
                                case '106.187.99.148':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                       }
                       break; // break ip address 0
                    case '107':
                       switch ($client_ip_address1) { 
                          case '107.131.':
                             switch ($client_ip_address) {
                                case '107.131.237.203':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '107.141.':
                             switch ($client_ip_address) {
                                case '107.141.170.82':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '107.150.':
                             switch ($client_ip_address) {
                                case '107.150.171.182':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '107.181.':
                             switch ($client_ip_address) {
                                case '107.181.161.169':
                                   $bIPIsTor = True;
                                   break;
                                case '107.181.174.84':
                                   $bIPIsTor = True;
                                   break;
                                case '107.181.178.204':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                       }
                       break; // break ip address 0
                    case '108':
                       switch ($client_ip_address1) { 
                          case '108.32.':
                             switch ($client_ip_address) {
                                case '108.32.49.20':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '108.61.':
                             switch ($client_ip_address) {
                                case '108.61.212.102':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '108.166.':
                             switch ($client_ip_address) {
                                case '108.166.168.158':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                       }
                       break; // break ip address 0
                    case '109':
                       switch ($client_ip_address1) { 
                          case '109.69.':
                             switch ($client_ip_address) {
                                case '109.69.67.17':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '109.74.':
                             switch ($client_ip_address) {
                                case '109.74.151.149':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '109.108.':
                             switch ($client_ip_address) {
                                case '109.108.218.232':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '109.120.':
                             switch ($client_ip_address) {
                                case '109.120.173.48':
                                   $bIPIsTor = True;
                                   break;
                                case '109.120.180.245':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '109.123.':
                             switch ($client_ip_address) {
                                case '109.123.123.164':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '109.126.':
                             switch ($client_ip_address) {
                                case '109.126.9.228':
                                   $bIPIsTor = True;
                                   break;
                                case '109.126.13.110':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '109.163.':
                             switch ($client_ip_address) {
                                case '109.163.234.2':
                                   $bIPIsTor = True;
                                   break;
                                case '109.163.234.4':
                                   $bIPIsTor = True;
                                   break;
                                case '109.163.234.5':
                                   $bIPIsTor = True;
                                   break;
                                case '109.163.234.7':
                                   $bIPIsTor = True;
                                   break;
                                case '109.163.234.8':
                                   $bIPIsTor = True;
                                   break;
                                case '109.163.234.9':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '109.169.':
                             switch ($client_ip_address) {
                                case '109.169.33.163':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '109.173.':
                             switch ($client_ip_address) {
                                case '109.173.56.190':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '109.190.':
                             switch ($client_ip_address) {
                                case '109.190.200.97':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '109.200.':
                             switch ($client_ip_address) {
                                case '109.200.130.62':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '109.201.':
                             switch ($client_ip_address) {
                                case '109.201.133.100':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '109.203.':
                             switch ($client_ip_address) {
                                case '109.203.108.67':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '109.230.':
                             switch ($client_ip_address) {
                                case '109.230.217.202':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                       }
                       break; // break ip address 0
                 }
                 break; // break second number
              case '11': // case second number
                 switch ($client_ip_address0) { 
                    case '110':
                       switch ($client_ip_address1) { 
                          case '110.93.':
                             switch ($client_ip_address) {
                                case '110.93.23.170':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '110.174.':
                             switch ($client_ip_address) {
                                case '110.174.43.136':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                       }
                       break; // break ip address 0
                    case '111':
                       switch ($client_ip_address1) { 
                          case '111.69.':
                             switch ($client_ip_address) {
                                case '111.69.140.74':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                       }
                       break; // break ip address 0
                    case '115':
                       switch ($client_ip_address1) { 
                          case '115.70.':
                             switch ($client_ip_address) {
                                case '115.70.208.17':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                       }
                       break; // break ip address 0
                    case '117':
                       switch ($client_ip_address1) { 
                          case '117.18.':
                             switch ($client_ip_address) {
                                case '117.18.75.235':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                       }
                       break; // break ip address 0
                 }
                 break; // break second number
              case '12': // case second number
                 switch ($client_ip_address0) { 
                    case '120':
                       switch ($client_ip_address1) { 
                          case '120.29.':
                             switch ($client_ip_address) {
                                case '120.29.217.46':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '120.57.':
                             switch ($client_ip_address) {
                                case '120.57.116.121':
                                   $bIPIsTor = True;
                                   break;
                                case '120.57.172.98':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                       }
                       break; // break ip address 0
                    case '121':
                       switch ($client_ip_address1) { 
                          case '121.54.':
                             switch ($client_ip_address) {
                                case '121.54.175.50':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '121.127.':
                             switch ($client_ip_address) {
                                case '121.127.250.156':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                       }
                       break; // break ip address 0
                    case '125':
                       switch ($client_ip_address1) { 
                          case '125.212.':
                             switch ($client_ip_address) {
                                case '125.212.205.179':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                       }
                       break; // break ip address 0
                    case '128':
                       switch ($client_ip_address1) { 
                          case '128.52.':
                             switch ($client_ip_address) {
                                case '128.52.128.105':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '128.68.':
                             switch ($client_ip_address) {
                                case '128.68.199.255':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '128.153.':
                             switch ($client_ip_address) {
                                case '128.153.145.125':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '128.199.':
                             switch ($client_ip_address) {
                                case '128.199.52.7':
                                   $bIPIsTor = True;
                                   break;
                                case '128.199.77.234':
                                   $bIPIsTor = True;
                                   break;
                                case '128.199.87.155':
                                   $bIPIsTor = True;
                                   break;
                                case '128.199.100.20':
                                   $bIPIsTor = True;
                                   break;
                                case '128.199.191.18':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                       }
                       break; // break ip address 0
                    case '129':
                       switch ($client_ip_address1) { 
                          case '129.127.':
                             switch ($client_ip_address) {
                                case '129.127.254.213':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                       }
                       break; // break ip address 0
                 }
                 break; // break second number
              case '13': // case second number
                 switch ($client_ip_address0) { 
                    case '133':
                       switch ($client_ip_address1) { 
                          case '133.38.':
                             switch ($client_ip_address) {
                                case '133.38.202.234':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                       }
                       break; // break ip address 0
                    case '134':
                       switch ($client_ip_address1) { 
                          case '134.3.':
                             switch ($client_ip_address) {
                                case '134.3.54.196':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                       }
                       break; // break ip address 0
                    case '136':
                       switch ($client_ip_address1) { 
                          case '136.0.':
                             switch ($client_ip_address) {
                                case '136.0.2.230':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '136.243.':
                             switch ($client_ip_address) {
                                case '136.243.98.54':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                       }
                       break; // break ip address 0
                    case '139':
                       switch ($client_ip_address1) { 
                          case '139.162.':
                             switch ($client_ip_address) {
                                case '139.162.10.72':
                                   $bIPIsTor = True;
                                   break;
                                case '139.162.20.241':
                                   $bIPIsTor = True;
                                   break;
                                case '139.162.144.155':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                       }
                       break; // break ip address 0
                 }
                 break; // break second number
              case '14': // case second number
                 switch ($client_ip_address0) { 
                    case '141':
                       switch ($client_ip_address1) { 
                          case '141.105.':
                             switch ($client_ip_address) {
                                case '141.105.68.12':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '141.138.':
                             switch ($client_ip_address) {
                                case '141.138.141.208':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '141.239.':
                             switch ($client_ip_address) {
                                case '141.239.145.226':
                                   $bIPIsTor = True;
                                   break;
                                case '141.239.243.208':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '141.255.':
                             switch ($client_ip_address) {
                                case '141.255.165.138':
                                   $bIPIsTor = True;
                                   break;
                                case '141.255.189.161':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                       }
                       break; // break ip address 0
                    case '142':
                       switch ($client_ip_address1) { 
                          case '142.4.':
                             switch ($client_ip_address) {
                                case '142.4.206.84':
                                   $bIPIsTor = True;
                                   break;
                                case '142.4.213.25':
                                   $bIPIsTor = True;
                                   break;
                                case '142.4.213.76':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                       }
                       break; // break ip address 0
                    case '146':
                       switch ($client_ip_address1) { 
                          case '146.0.':
                             switch ($client_ip_address) {
                                case '146.0.72.180':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '146.115.':
                             switch ($client_ip_address) {
                                case '146.115.145.143':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '146.185.':
                             switch ($client_ip_address) {
                                case '146.185.150.219':
                                   $bIPIsTor = True;
                                   break;
                                case '146.185.177.103':
                                   $bIPIsTor = True;
                                   break;
                                case '146.185.239.240':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                       }
                       break; // break ip address 0
                    case '147':
                       switch ($client_ip_address1) { 
                          case '147.75.':
                             switch ($client_ip_address) {
                                case '147.75.194.73':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                       }
                       break; // break ip address 0
                    case '149':
                       switch ($client_ip_address1) { 
                          case '149.62.':
                             switch ($client_ip_address) {
                                case '149.62.148.41':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '149.202.':
                             switch ($client_ip_address) {
                                case '149.202.12.126':
                                   $bIPIsTor = True;
                                   break;
                                case '149.202.42.188':
                                   $bIPIsTor = True;
                                   break;
                                case '149.202.47.181':
                                   $bIPIsTor = True;
                                   break;
                                case '149.202.98.160':
                                   $bIPIsTor = True;
                                   break;
                                case '149.202.98.161':
                                   $bIPIsTor = True;
                                   break;
                                case '149.202.167.26':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                       }
                       break; // break ip address 0
                 }
                 break; // break second number
              case '15': // case second number
                 switch ($client_ip_address0) { 
                    case '150':
                       switch ($client_ip_address1) { 
                          case '150.107.':
                             switch ($client_ip_address) {
                                case '150.107.150.101':
                                   $bIPIsTor = True;
                                   break;
                                case '150.107.150.102':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '150.145.':
                             switch ($client_ip_address) {
                                case '150.145.1.88':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                       }
                       break; // break ip address 0
                    case '151':
                       switch ($client_ip_address1) { 
                          case '151.1.':
                             switch ($client_ip_address) {
                                case '151.1.182.128':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '151.80.':
                             switch ($client_ip_address) {
                                case '151.80.38.15':
                                   $bIPIsTor = True;
                                   break;
                                case '151.80.132.88':
                                   $bIPIsTor = True;
                                   break;
                                case '151.80.138.19':
                                   $bIPIsTor = True;
                                   break;
                                case '151.80.164.147':
                                   $bIPIsTor = True;
                                   break;
                                case '151.80.175.238':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                       }
                       break; // break ip address 0
                    case '153':
                       switch ($client_ip_address1) { 
                          case '153.92.':
                             switch ($client_ip_address) {
                                case '153.92.44.90':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '153.127.':
                             switch ($client_ip_address) {
                                case '153.127.255.51':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '153.200.':
                             switch ($client_ip_address) {
                                case '153.200.251.69':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '153.203.':
                             switch ($client_ip_address) {
                                case '153.203.216.129':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '153.205.':
                             switch ($client_ip_address) {
                                case '153.205.42.3':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                       }
                       break; // break ip address 0
                    case '154':
                       switch ($client_ip_address1) { 
                          case '154.127.':
                             switch ($client_ip_address) {
                                case '154.127.61.249':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                       }
                       break; // break ip address 0
                    case '158':
                       switch ($client_ip_address1) { 
                          case '158.69.':
                             switch ($client_ip_address) {
                                case '158.69.109.58':
                                   $bIPIsTor = True;
                                   break;
                                case '158.69.192.220':
                                   $bIPIsTor = True;
                                   break;
                                case '158.69.201.128':
                                   $bIPIsTor = True;
                                   break;
                                case '158.69.201.229':
                                   $bIPIsTor = True;
                                   break;
                                case '158.69.208.131':
                                   $bIPIsTor = True;
                                   break;
                                case '158.69.211.111':
                                   $bIPIsTor = True;
                                   break;
                                case '158.69.214.111':
                                   $bIPIsTor = True;
                                   break;
                                case '158.69.215.7':
                                   $bIPIsTor = True;
                                   break;
                                case '158.69.215.68':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '158.130.':
                             switch ($client_ip_address) {
                                case '158.130.0.242':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '158.193.':
                             switch ($client_ip_address) {
                                case '158.193.152.117':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                       }
                       break; // break ip address 0
                    case '159':
                       switch ($client_ip_address1) { 
                          case '159.203.':
                             switch ($client_ip_address) {
                                case '159.203.11.12':
                                   $bIPIsTor = True;
                                   break;
                                case '159.203.15.136':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                       }
                       break; // break ip address 0
                 }
                 break; // break second number
              case '16': // case second number
                 switch ($client_ip_address0) { 
                    case '162':
                       switch ($client_ip_address1) { 
                          case '162.213.':
                             switch ($client_ip_address) {
                                case '162.213.1.5':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '162.219.':
                             switch ($client_ip_address) {
                                case '162.219.2.177':
                                   $bIPIsTor = True;
                                   break;
                                case '162.219.4.165':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '162.221.':
                             switch ($client_ip_address) {
                                case '162.221.201.57':
                                   $bIPIsTor = True;
                                   break;
                                case '162.221.202.230':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '162.243.':
                             switch ($client_ip_address) {
                                case '162.243.96.30':
                                   $bIPIsTor = True;
                                   break;
                                case '162.243.100.225':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '162.247.':
                             switch ($client_ip_address) {
                                case '162.247.72.7':
                                   $bIPIsTor = True;
                                   break;
                                case '162.247.72.27':
                                   $bIPIsTor = True;
                                   break;
                                case '162.247.72.199':
                                   $bIPIsTor = True;
                                   break;
                                case '162.247.72.200':
                                   $bIPIsTor = True;
                                   break;
                                case '162.247.72.201':
                                   $bIPIsTor = True;
                                   break;
                                case '162.247.72.202':
                                   $bIPIsTor = True;
                                   break;
                                case '162.247.72.212':
                                   $bIPIsTor = True;
                                   break;
                                case '162.247.72.213':
                                   $bIPIsTor = True;
                                   break;
                                case '162.247.72.216':
                                   $bIPIsTor = True;
                                   break;
                                case '162.247.72.217':
                                   $bIPIsTor = True;
                                   break;
                                case '162.247.73.74':
                                   $bIPIsTor = True;
                                   break;
                                case '162.247.73.204':
                                   $bIPIsTor = True;
                                   break;
                                case '162.247.73.206':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '162.248.':
                             switch ($client_ip_address) {
                                case '162.248.9.218':
                                   $bIPIsTor = True;
                                   break;
                                case '162.248.10.132':
                                   $bIPIsTor = True;
                                   break;
                                case '162.248.11.176':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '162.251.':
                             switch ($client_ip_address) {
                                case '162.251.167.74':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                       }
                       break; // break ip address 0
                    case '163':
                       switch ($client_ip_address1) { 
                          case '163.22.':
                             switch ($client_ip_address) {
                                case '163.22.17.40':
                                   $bIPIsTor = True;
                                   break;
                                case '163.22.17.41':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '163.47.':
                             switch ($client_ip_address) {
                                case '163.47.8.188':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                       }
                       break; // break ip address 0
                    case '166':
                       switch ($client_ip_address1) { 
                          case '166.70.':
                             switch ($client_ip_address) {
                                case '166.70.15.14':
                                   $bIPIsTor = True;
                                   break;
                                case '166.70.207.2':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                       }
                       break; // break ip address 0
                    case '167':
                       switch ($client_ip_address1) { 
                          case '167.88.':
                             switch ($client_ip_address) {
                                case '167.88.35.108':
                                   $bIPIsTor = True;
                                   break;
                                case '167.88.40.232':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                       }
                       break; // break ip address 0
                 }
                 break; // break second number
              case '17': // case second number
                 switch ($client_ip_address0) { 
                    case '171':
                       switch ($client_ip_address1) { 
                          case '171.25.':
                             switch ($client_ip_address) {
                                case '171.25.193.20':
                                   $bIPIsTor = True;
                                   break;
                                case '171.25.193.25':
                                   $bIPIsTor = True;
                                   break;
                                case '171.25.193.77':
                                   $bIPIsTor = True;
                                   break;
                                case '171.25.193.78':
                                   $bIPIsTor = True;
                                   break;
                                case '171.25.193.131':
                                   $bIPIsTor = True;
                                   break;
                                case '171.25.193.132':
                                   $bIPIsTor = True;
                                   break;
                                case '171.25.193.235':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                       }
                       break; // break ip address 0
                    case '172':
                       switch ($client_ip_address1) { 
                          case '172.97.':
                             switch ($client_ip_address) {
                                case '172.97.103.47':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                       }
                       break; // break ip address 0
                    case '173':
                       switch ($client_ip_address1) { 
                          case '173.14.':
                             switch ($client_ip_address) {
                                case '173.14.173.227':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '173.179.':
                             switch ($client_ip_address) {
                                case '173.179.218.197':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '173.208.':
                             switch ($client_ip_address) {
                                case '173.208.213.114':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '173.254.':
                             switch ($client_ip_address) {
                                case '173.254.216.66':
                                   $bIPIsTor = True;
                                   break;
                                case '173.254.216.67':
                                   $bIPIsTor = True;
                                   break;
                                case '173.254.216.68':
                                   $bIPIsTor = True;
                                   break;
                                case '173.254.216.69':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '173.255.':
                             switch ($client_ip_address) {
                                case '173.255.196.30':
                                   $bIPIsTor = True;
                                   break;
                                case '173.255.210.205':
                                   $bIPIsTor = True;
                                   break;
                                case '173.255.226.142':
                                   $bIPIsTor = True;
                                   break;
                                case '173.255.229.8':
                                   $bIPIsTor = True;
                                   break;
                                case '173.255.232.192':
                                   $bIPIsTor = True;
                                   break;
                                case '173.255.250.240':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                       }
                       break; // break ip address 0
                    case '175':
                       switch ($client_ip_address1) { 
                          case '175.135.':
                             switch ($client_ip_address) {
                                case '175.135.65.222':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                       }
                       break; // break ip address 0
                    case '176':
                       switch ($client_ip_address1) { 
                          case '176.9.':
                             switch ($client_ip_address) {
                                case '176.9.145.194':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '176.10.':
                             switch ($client_ip_address) {
                                case '176.10.99.200':
                                   $bIPIsTor = True;
                                   break;
                                case '176.10.99.201':
                                   $bIPIsTor = True;
                                   break;
                                case '176.10.99.202':
                                   $bIPIsTor = True;
                                   break;
                                case '176.10.99.203':
                                   $bIPIsTor = True;
                                   break;
                                case '176.10.99.204':
                                   $bIPIsTor = True;
                                   break;
                                case '176.10.99.205':
                                   $bIPIsTor = True;
                                   break;
                                case '176.10.99.206':
                                   $bIPIsTor = True;
                                   break;
                                case '176.10.99.207':
                                   $bIPIsTor = True;
                                   break;
                                case '176.10.99.208':
                                   $bIPIsTor = True;
                                   break;
                                case '176.10.99.209':
                                   $bIPIsTor = True;
                                   break;
                                case '176.10.104.240':
                                   $bIPIsTor = True;
                                   break;
                                case '176.10.104.243':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '176.31.':
                             switch ($client_ip_address) {
                                case '176.31.45.7':
                                   $bIPIsTor = True;
                                   break;
                                case '176.31.121.196':
                                   $bIPIsTor = True;
                                   break;
                                case '176.31.200.122':
                                   $bIPIsTor = True;
                                   break;
                                case '176.31.215.157':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '176.37.':
                             switch ($client_ip_address) {
                                case '176.37.40.213':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '176.58.':
                             switch ($client_ip_address) {
                                case '176.58.89.182':
                                   $bIPIsTor = True;
                                   break;
                                case '176.58.100.98':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '176.61.':
                             switch ($client_ip_address) {
                                case '176.61.147.146':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '176.67.':
                             switch ($client_ip_address) {
                                case '176.67.168.240':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '176.77.':
                             switch ($client_ip_address) {
                                case '176.77.71.170':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '176.116.':
                             switch ($client_ip_address) {
                                case '176.116.104.49':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '176.121.':
                             switch ($client_ip_address) {
                                case '176.121.81.51':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '176.123.':
                             switch ($client_ip_address) {
                                case '176.123.27.254':
                                   $bIPIsTor = True;
                                   break;
                                case '176.123.29.69':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '176.126.':
                             switch ($client_ip_address) {
                                case '176.126.85.175':
                                   $bIPIsTor = True;
                                   break;
                                case '176.126.85.176':
                                   $bIPIsTor = True;
                                   break;
                                case '176.126.252.11':
                                   $bIPIsTor = True;
                                   break;
                                case '176.126.252.12':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '176.227.':
                             switch ($client_ip_address) {
                                case '176.227.202.168':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                       }
                       break; // break ip address 0
                    case '177':
                       switch ($client_ip_address1) { 
                          case '177.95.':
                             switch ($client_ip_address) {
                                case '177.95.10.222':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '177.97.':
                             switch ($client_ip_address) {
                                case '177.97.253.87':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '177.141.':
                             switch ($client_ip_address) {
                                case '177.141.16.50':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                       }
                       break; // break ip address 0
                    case '178':
                       switch ($client_ip_address1) { 
                          case '178.17.':
                             switch ($client_ip_address) {
                                case '178.17.41.141':
                                   $bIPIsTor = True;
                                   break;
                                case '178.17.174.10':
                                   $bIPIsTor = True;
                                   break;
                                case '178.17.174.99':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '178.18.':
                             switch ($client_ip_address) {
                                case '178.18.17.204':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '178.20.':
                             switch ($client_ip_address) {
                                case '178.20.55.16':
                                   $bIPIsTor = True;
                                   break;
                                case '178.20.55.18':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '178.32.':
                             switch ($client_ip_address) {
                                case '178.32.53.53':
                                   $bIPIsTor = True;
                                   break;
                                case '178.32.53.94':
                                   $bIPIsTor = True;
                                   break;
                                case '178.32.53.154':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '178.33.':
                             switch ($client_ip_address) {
                                case '178.33.26.3':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '178.62.':
                             switch ($client_ip_address) {
                                case '178.62.135.191':
                                   $bIPIsTor = True;
                                   break;
                                case '178.62.197.118':
                                   $bIPIsTor = True;
                                   break;
                                case '178.62.217.233':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '178.63.':
                             switch ($client_ip_address) {
                                case '178.63.97.34':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '178.151.':
                             switch ($client_ip_address) {
                                case '178.151.182.123':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '178.162.':
                             switch ($client_ip_address) {
                                case '178.162.216.42':
                                   $bIPIsTor = True;
                                   break;
                                case '178.162.222.228':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '178.175.':
                             switch ($client_ip_address) {
                                case '178.175.128.50':
                                   $bIPIsTor = True;
                                   break;
                                case '178.175.131.194':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '178.209.':
                             switch ($client_ip_address) {
                                case '178.209.50.151':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '178.238.':
                             switch ($client_ip_address) {
                                case '178.238.223.67':
                                   $bIPIsTor = True;
                                   break;
                                case '178.238.225.108':
                                   $bIPIsTor = True;
                                   break;
                                case '178.238.237.44':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '178.239.':
                             switch ($client_ip_address) {
                                case '178.239.62.139':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '178.252.':
                             switch ($client_ip_address) {
                                case '178.252.28.200':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                       }
                       break; // break ip address 0
                    case '179':
                       switch ($client_ip_address1) { 
                          case '179.0.':
                             switch ($client_ip_address) {
                                case '179.0.194.199':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '179.43.':
                             switch ($client_ip_address) {
                                case '179.43.143.162':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '179.219.':
                             switch ($client_ip_address) {
                                case '179.219.4.248':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                       }
                       break; // break ip address 0
                 }
                 break; // break second number
              case '18': // case second number
                 switch ($client_ip_address0) { 
                    case '180':
                       switch ($client_ip_address1) { 
                          case '180.210.':
                             switch ($client_ip_address) {
                                case '180.210.203.249':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                       }
                       break; // break ip address 0
                    case '181':
                       switch ($client_ip_address1) { 
                          case '181.41.':
                             switch ($client_ip_address) {
                                case '181.41.219.117':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '181.46.':
                             switch ($client_ip_address) {
                                case '181.46.149.49':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                       }
                       break; // break ip address 0
                    case '184':
                       switch ($client_ip_address1) { 
                          case '184.105.':
                             switch ($client_ip_address) {
                                case '184.105.220.24':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                       }
                       break; // break ip address 0
                    case '185':
                       switch ($client_ip_address1) { 
                          case '185.8.':
                             switch ($client_ip_address) {
                                case '185.8.63.16':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '185.12.':
                             switch ($client_ip_address) {
                                case '185.12.12.133':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '185.14.':
                             switch ($client_ip_address) {
                                case '185.14.28.109':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '185.16.':
                             switch ($client_ip_address) {
                                case '185.16.173.84':
                                   $bIPIsTor = True;
                                   break;
                                case '185.16.200.176':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '185.17.':
                             switch ($client_ip_address) {
                                case '185.17.144.138':
                                   $bIPIsTor = True;
                                   break;
                                case '185.17.184.228':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '185.19.':
                             switch ($client_ip_address) {
                                case '185.19.93.99':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '185.26.':
                             switch ($client_ip_address) {
                                case '185.26.197.13':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '185.29.':
                             switch ($client_ip_address) {
                                case '185.29.8.132':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '185.31.':
                             switch ($client_ip_address) {
                                case '185.31.136.244':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '185.34.':
                             switch ($client_ip_address) {
                                case '185.34.33.2':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '185.36.':
                             switch ($client_ip_address) {
                                case '185.36.100.145':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '185.38.':
                             switch ($client_ip_address) {
                                case '185.38.14.215':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '185.44.':
                             switch ($client_ip_address) {
                                case '185.44.228.152':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '185.60.':
                             switch ($client_ip_address) {
                                case '185.60.144.31':
                                   $bIPIsTor = True;
                                   break;
                                case '185.60.144.32':
                                   $bIPIsTor = True;
                                   break;
                                case '185.60.144.33':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '185.61.':
                             switch ($client_ip_address) {
                                case '185.61.148.189':
                                   $bIPIsTor = True;
                                   break;
                                case '185.61.149.41':
                                   $bIPIsTor = True;
                                   break;
                                case '185.61.149.51':
                                   $bIPIsTor = True;
                                   break;
                                case '185.61.149.193':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '185.62.':
                             switch ($client_ip_address) {
                                case '185.62.190.38':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '185.65.':
                             switch ($client_ip_address) {
                                case '185.65.121.134':
                                   $bIPIsTor = True;
                                   break;
                                case '185.65.135.227':
                                   $bIPIsTor = True;
                                   break;
                                case '185.65.200.93':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '185.72.':
                             switch ($client_ip_address) {
                                case '185.72.178.65':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '185.73.':
                             switch ($client_ip_address) {
                                case '185.73.44.54':
                                   $bIPIsTor = True;
                                   break;
                                case '185.73.44.58':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '185.75.':
                             switch ($client_ip_address) {
                                case '185.75.56.104':
                                   $bIPIsTor = True;
                                   break;
                                case '185.75.56.110':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '185.82.':
                             switch ($client_ip_address) {
                                case '185.82.217.25':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '185.86.':
                             switch ($client_ip_address) {
                                case '185.86.78.67':
                                   $bIPIsTor = True;
                                   break;
                                case '185.86.148.17':
                                   $bIPIsTor = True;
                                   break;
                                case '185.86.148.27':
                                   $bIPIsTor = True;
                                   break;
                                case '185.86.148.137':
                                   $bIPIsTor = True;
                                   break;
                                case '185.86.148.162':
                                   $bIPIsTor = True;
                                   break;
                                case '185.86.149.127':
                                   $bIPIsTor = True;
                                   break;
                                case '185.86.149.205':
                                   $bIPIsTor = True;
                                   break;
                                case '185.86.149.248':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '185.100.':
                             switch ($client_ip_address) {
                                case '185.100.84.82':
                                   $bIPIsTor = True;
                                   break;
                                case '185.100.85.61':
                                   $bIPIsTor = True;
                                   break;
                                case '185.100.85.101':
                                   $bIPIsTor = True;
                                   break;
                                case '185.100.85.132':
                                   $bIPIsTor = True;
                                   break;
                                case '185.100.85.138':
                                   $bIPIsTor = True;
                                   break;
                                case '185.100.85.147':
                                   $bIPIsTor = True;
                                   break;
                                case '185.100.85.190':
                                   $bIPIsTor = True;
                                   break;
                                case '185.100.85.191':
                                   $bIPIsTor = True;
                                   break;
                                case '185.100.85.192':
                                   $bIPIsTor = True;
                                   break;
                                case '185.100.86.86':
                                   $bIPIsTor = True;
                                   break;
                                case '185.100.86.100':
                                   $bIPIsTor = True;
                                   break;
                                case '185.100.86.128':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '185.101.':
                             switch ($client_ip_address) {
                                case '185.101.107.136':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '185.104.':
                             switch ($client_ip_address) {
                                case '185.104.120.2':
                                   $bIPIsTor = True;
                                   break;
                                case '185.104.120.3':
                                   $bIPIsTor = True;
                                   break;
                                case '185.104.120.4':
                                   $bIPIsTor = True;
                                   break;
                                case '185.104.120.7':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '185.106.':
                             switch ($client_ip_address) {
                                case '185.106.92.68':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '185.117.':
                             switch ($client_ip_address) {
                                case '185.117.82.132':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '185.125.':
                             switch ($client_ip_address) {
                                case '185.125.218.97':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '185.129.':
                             switch ($client_ip_address) {
                                case '185.129.62.62':
                                   $bIPIsTor = True;
                                   break;
                                case '185.129.62.63':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                       }
                       break; // break ip address 0
                    case '187':
                       switch ($client_ip_address1) { 
                          case '187.20.':
                             switch ($client_ip_address) {
                                case '187.20.201.61':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                       }
                       break; // break ip address 0
                    case '188':
                       switch ($client_ip_address1) { 
                          case '188.40.':
                             switch ($client_ip_address) {
                                case '188.40.50.75':
                                   $bIPIsTor = True;
                                   break;
                                case '188.40.178.5':
                                   $bIPIsTor = True;
                                   break;
                                case '188.40.227.34':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '188.68.':
                             switch ($client_ip_address) {
                                case '188.68.229.144':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '188.78.':
                             switch ($client_ip_address) {
                                case '188.78.209.211':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '188.98.':
                             switch ($client_ip_address) {
                                case '188.98.10.209':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '188.120.':
                             switch ($client_ip_address) {
                                case '188.120.253.39':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '188.126.':
                             switch ($client_ip_address) {
                                case '188.126.81.155':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '188.129.':
                             switch ($client_ip_address) {
                                case '188.129.39.122':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '188.138.':
                             switch ($client_ip_address) {
                                case '188.138.9.49':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '188.165.':
                             switch ($client_ip_address) {
                                case '188.165.59.43':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '188.166.':
                             switch ($client_ip_address) {
                                case '188.166.6.6':
                                   $bIPIsTor = True;
                                   break;
                                case '188.166.6.133':
                                   $bIPIsTor = True;
                                   break;
                                case '188.166.50.59':
                                   $bIPIsTor = True;
                                   break;
                                case '188.166.76.77':
                                   $bIPIsTor = True;
                                   break;
                                case '188.166.80.153':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '188.167.':
                             switch ($client_ip_address) {
                                case '188.167.69.224':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '188.187.':
                             switch ($client_ip_address) {
                                case '188.187.130.3':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '188.209.':
                             switch ($client_ip_address) {
                                case '188.209.52.109':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '188.214.':
                             switch ($client_ip_address) {
                                case '188.214.129.85':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '188.226.':
                             switch ($client_ip_address) {
                                case '188.226.192.48':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                       }
                       break; // break ip address 0
                    case '189':
                       switch ($client_ip_address1) { 
                          case '189.58.':
                             switch ($client_ip_address) {
                                case '189.58.81.71':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '189.90.':
                             switch ($client_ip_address) {
                                case '189.90.49.34':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                       }
                       break; // break ip address 0
                 }
                 break; // break second number
              case '19': // case second number
                 switch ($client_ip_address0) { 
                    case '190':
                       switch ($client_ip_address1) { 
                          case '190.5.':
                             switch ($client_ip_address) {
                                case '190.5.56.153':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '190.10.':
                             switch ($client_ip_address) {
                                case '190.10.8.50':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '190.181.':
                             switch ($client_ip_address) {
                                case '190.181.124.34':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '190.216.':
                             switch ($client_ip_address) {
                                case '190.216.2.136':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                       }
                       break; // break ip address 0
                    case '191':
                       switch ($client_ip_address1) { 
                          case '191.101.':
                             switch ($client_ip_address) {
                                case '191.101.251.138':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                       }
                       break; // break ip address 0
                    case '192':
                       switch ($client_ip_address1) { 
                          case '192.3.':
                             switch ($client_ip_address) {
                                case '192.3.172.236':
                                   $bIPIsTor = True;
                                   break;
                                case '192.3.177.167':
                                   $bIPIsTor = True;
                                   break;
                                case '192.3.203.97':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '192.34.':
                             switch ($client_ip_address) {
                                case '192.34.80.176':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '192.42.':
                             switch ($client_ip_address) {
                                case '192.42.113.102':
                                   $bIPIsTor = True;
                                   break;
                                case '192.42.115.101':
                                   $bIPIsTor = True;
                                   break;
                                case '192.42.115.102':
                                   $bIPIsTor = True;
                                   break;
                                case '192.42.116.16':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '192.87.':
                             switch ($client_ip_address) {
                                case '192.87.28.28':
                                   $bIPIsTor = True;
                                   break;
                                case '192.87.28.82':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '192.99.':
                             switch ($client_ip_address) {
                                case '192.99.2.137':
                                   $bIPIsTor = True;
                                   break;
                                case '192.99.13.133':
                                   $bIPIsTor = True;
                                   break;
                                case '192.99.41.217':
                                   $bIPIsTor = True;
                                   break;
                                case '192.99.240.150':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '192.121.':
                             switch ($client_ip_address) {
                                case '192.121.66.7':
                                   $bIPIsTor = True;
                                   break;
                                case '192.121.66.199':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '192.155.':
                             switch ($client_ip_address) {
                                case '192.155.95.222':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                       }
                       break; // break ip address 0
                    case '193':
                       switch ($client_ip_address1) { 
                          case '193.0.':
                             switch ($client_ip_address) {
                                case '193.0.100.130':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '193.9.':
                             switch ($client_ip_address) {
                                case '193.9.28.180':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '193.33.':
                             switch ($client_ip_address) {
                                case '193.33.216.23':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '193.40.':
                             switch ($client_ip_address) {
                                case '193.40.252.113':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '193.90.':
                             switch ($client_ip_address) {
                                case '193.90.12.86':
                                   $bIPIsTor = True;
                                   break;
                                case '193.90.12.87':
                                   $bIPIsTor = True;
                                   break;
                                case '193.90.12.88':
                                   $bIPIsTor = True;
                                   break;
                                case '193.90.12.89':
                                   $bIPIsTor = True;
                                   break;
                                case '193.90.12.90':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '193.107.':
                             switch ($client_ip_address) {
                                case '193.107.85.56':
                                   $bIPIsTor = True;
                                   break;
                                case '193.107.85.57':
                                   $bIPIsTor = True;
                                   break;
                                case '193.107.85.61':
                                   $bIPIsTor = True;
                                   break;
                                case '193.107.85.62':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '193.111.':
                             switch ($client_ip_address) {
                                case '193.111.136.162':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '193.171.':
                             switch ($client_ip_address) {
                                case '193.171.202.150':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '193.200.':
                             switch ($client_ip_address) {
                                case '193.200.241.195':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                       }
                       break; // break ip address 0
                    case '194':
                       switch ($client_ip_address1) { 
                          case '194.63.':
                             switch ($client_ip_address) {
                                case '194.63.141.120':
                                   $bIPIsTor = True;
                                   break;
                                case '194.63.142.176':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '194.104.':
                             switch ($client_ip_address) {
                                case '194.104.0.100':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '194.150.':
                             switch ($client_ip_address) {
                                case '194.150.168.79':
                                   $bIPIsTor = True;
                                   break;
                                case '194.150.168.95':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '194.218.':
                             switch ($client_ip_address) {
                                case '194.218.3.79':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                       }
                       break; // break ip address 0
                    case '195':
                       switch ($client_ip_address1) { 
                          case '195.19.':
                             switch ($client_ip_address) {
                                case '195.19.194.108':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '195.22.':
                             switch ($client_ip_address) {
                                case '195.22.126.119':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '195.40.':
                             switch ($client_ip_address) {
                                case '195.40.181.35':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '195.46.':
                             switch ($client_ip_address) {
                                case '195.46.185.37':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '195.62.':
                             switch ($client_ip_address) {
                                case '195.62.53.58':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '195.154.':
                             switch ($client_ip_address) {
                                case '195.154.7.33':
                                   $bIPIsTor = True;
                                   break;
                                case '195.154.15.227':
                                   $bIPIsTor = True;
                                   break;
                                case '195.154.56.44':
                                   $bIPIsTor = True;
                                   break;
                                case '195.154.90.122':
                                   $bIPIsTor = True;
                                   break;
                                case '195.154.93.144':
                                   $bIPIsTor = True;
                                   break;
                                case '195.154.119.187':
                                   $bIPIsTor = True;
                                   break;
                                case '195.154.134.146':
                                   $bIPIsTor = True;
                                   break;
                                case '195.154.251.25':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '195.169.':
                             switch ($client_ip_address) {
                                case '195.169.125.226':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '195.211.':
                             switch ($client_ip_address) {
                                case '195.211.103.58':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '195.228.':
                             switch ($client_ip_address) {
                                case '195.228.45.176':
                                   $bIPIsTor = True;
                                   break;
                                case '195.228.75.131':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '195.251.':
                             switch ($client_ip_address) {
                                case '195.251.166.17':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '195.254.':
                             switch ($client_ip_address) {
                                case '195.254.135.76':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                       }
                       break; // break ip address 0
                    case '197':
                       switch ($client_ip_address1) { 
                          case '197.164.':
                             switch ($client_ip_address) {
                                case '197.164.187.150':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '197.231.':
                             switch ($client_ip_address) {
                                case '197.231.221.211':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                       }
                       break; // break ip address 0
                    case '198':
                       switch ($client_ip_address1) { 
                          case '198.23.':
                             switch ($client_ip_address) {
                                case '198.23.202.71':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '198.27.':
                             switch ($client_ip_address) {
                                case '198.27.127.222':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '198.46.':
                             switch ($client_ip_address) {
                                case '198.46.142.47':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '198.50.':
                             switch ($client_ip_address) {
                                case '198.50.145.72':
                                   $bIPIsTor = True;
                                   break;
                                case '198.50.191.95':
                                   $bIPIsTor = True;
                                   break;
                                case '198.50.200.131':
                                   $bIPIsTor = True;
                                   break;
                                case '198.50.200.135':
                                   $bIPIsTor = True;
                                   break;
                                case '198.50.210.164':
                                   $bIPIsTor = True;
                                   break;
                                case '198.50.231.22':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '198.51.':
                             switch ($client_ip_address) {
                                case '198.51.75.165':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '198.58.':
                             switch ($client_ip_address) {
                                case '198.58.107.53':
                                   $bIPIsTor = True;
                                   break;
                                case '198.58.115.210':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '198.73.':
                             switch ($client_ip_address) {
                                case '198.73.50.71':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '198.96.':
                             switch ($client_ip_address) {
                                case '198.96.155.3':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '198.134.':
                             switch ($client_ip_address) {
                                case '198.134.125.78':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '198.211.':
                             switch ($client_ip_address) {
                                case '198.211.122.191':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                       }
                       break; // break ip address 0
                    case '199':
                       switch ($client_ip_address1) { 
                          case '199.68.':
                             switch ($client_ip_address) {
                                case '199.68.196.124':
                                   $bIPIsTor = True;
                                   break;
                                case '199.68.196.125':
                                   $bIPIsTor = True;
                                   break;
                                case '199.68.196.126':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '199.87.':
                             switch ($client_ip_address) {
                                case '199.87.154.251':
                                   $bIPIsTor = True;
                                   break;
                                case '199.87.154.255':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '199.127.':
                             switch ($client_ip_address) {
                                case '199.127.226.150':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                       }
                       break; // break ip address 0
                 }
                 break; // break second number
           }
           break; // break first number
        case '2':
           switch ($client_ip_address0_second_character) { 
              case '20': // case second number
                 switch ($client_ip_address0) { 
                    case '200':
                       switch ($client_ip_address1) { 
                          case '200.63.':
                             switch ($client_ip_address) {
                                case '200.63.47.10':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '200.98.':
                             switch ($client_ip_address) {
                                case '200.98.142.76':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                       }
                       break; // break ip address 0
                    case '201':
                       switch ($client_ip_address1) { 
                          case '201.93.':
                             switch ($client_ip_address) {
                                case '201.93.255.113':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                       }
                       break; // break ip address 0
                    case '203':
                       switch ($client_ip_address1) { 
                          case '203.118.':
                             switch ($client_ip_address) {
                                case '203.118.133.156':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '203.161.':
                             switch ($client_ip_address) {
                                case '203.161.103.17':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '203.166.':
                             switch ($client_ip_address) {
                                case '203.166.236.231':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '203.217.':
                             switch ($client_ip_address) {
                                case '203.217.173.146':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                       }
                       break; // break ip address 0
                    case '204':
                       switch ($client_ip_address1) { 
                          case '204.8.':
                             switch ($client_ip_address) {
                                case '204.8.156.142':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '204.11.':
                             switch ($client_ip_address) {
                                case '204.11.50.131':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '204.13.':
                             switch ($client_ip_address) {
                                case '204.13.164.54':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '204.17.':
                             switch ($client_ip_address) {
                                case '204.17.56.42':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '204.27.':
                             switch ($client_ip_address) {
                                case '204.27.60.147':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '204.44.':
                             switch ($client_ip_address) {
                                case '204.44.115.143':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '204.85.':
                             switch ($client_ip_address) {
                                case '204.85.191.30':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '204.124.':
                             switch ($client_ip_address) {
                                case '204.124.83.130':
                                   $bIPIsTor = True;
                                   break;
                                case '204.124.83.134':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '204.194.':
                             switch ($client_ip_address) {
                                case '204.194.29.4':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                       }
                       break; // break ip address 0
                    case '205':
                       switch ($client_ip_address1) { 
                          case '205.168.':
                             switch ($client_ip_address) {
                                case '205.168.84.133':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                       }
                       break; // break ip address 0
                    case '206':
                       switch ($client_ip_address1) { 
                          case '206.248.':
                             switch ($client_ip_address) {
                                case '206.248.184.127':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                       }
                       break; // break ip address 0
                    case '207':
                       switch ($client_ip_address1) { 
                          case '207.192.':
                             switch ($client_ip_address) {
                                case '207.192.69.165':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '207.201.':
                             switch ($client_ip_address) {
                                case '207.201.223.195':
                                   $bIPIsTor = True;
                                   break;
                                case '207.201.223.196':
                                   $bIPIsTor = True;
                                   break;
                                case '207.201.223.197':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '207.244.':
                             switch ($client_ip_address) {
                                case '207.244.70.35':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                       }
                       break; // break ip address 0
                    case '208':
                       switch ($client_ip_address1) { 
                          case '208.67.':
                             switch ($client_ip_address) {
                                case '208.67.1.82':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '208.94.':
                             switch ($client_ip_address) {
                                case '208.94.242.222':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '208.111.':
                             switch ($client_ip_address) {
                                case '208.111.35.80':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                       }
                       break; // break ip address 0
                    case '209':
                       switch ($client_ip_address1) { 
                          case '209.58.':
                             switch ($client_ip_address) {
                                case '209.58.176.42':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '209.66.':
                             switch ($client_ip_address) {
                                case '209.66.119.150':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '209.133.':
                             switch ($client_ip_address) {
                                case '209.133.66.214':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '209.141.':
                             switch ($client_ip_address) {
                                case '209.141.43.84':
                                   $bIPIsTor = True;
                                   break;
                                case '209.141.43.114':
                                   $bIPIsTor = True;
                                   break;
                                case '209.141.52.138':
                                   $bIPIsTor = True;
                                   break;
                                case '209.141.56.40':
                                   $bIPIsTor = True;
                                   break;
                                case '209.141.58.210':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '209.159.':
                             switch ($client_ip_address) {
                                case '209.159.138.19':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '209.249.':
                             switch ($client_ip_address) {
                                case '209.249.157.69':
                                   $bIPIsTor = True;
                                   break;
                                case '209.249.180.198':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                       }
                       break; // break ip address 0
                 }
                 break; // break second number
              case '21': // case second number
                 switch ($client_ip_address0) { 
                    case '210':
                       switch ($client_ip_address1) { 
                          case '210.211.':
                             switch ($client_ip_address) {
                                case '210.211.122.204':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                       }
                       break; // break ip address 0
                    case '211':
                       switch ($client_ip_address1) { 
                          case '211.76.':
                             switch ($client_ip_address) {
                                case '211.76.55.92':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                       }
                       break; // break ip address 0
                    case '212':
                       switch ($client_ip_address1) { 
                          case '212.7.':
                             switch ($client_ip_address) {
                                case '212.7.194.23':
                                   $bIPIsTor = True;
                                   break;
                                case '212.7.196.82':
                                   $bIPIsTor = True;
                                   break;
                                case '212.7.200.15':
                                   $bIPIsTor = True;
                                   break;
                                case '212.7.217.32':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '212.16.':
                             switch ($client_ip_address) {
                                case '212.16.104.33':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '212.19.':
                             switch ($client_ip_address) {
                                case '212.19.17.213':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '212.21.':
                             switch ($client_ip_address) {
                                case '212.21.66.6':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '212.24.':
                             switch ($client_ip_address) {
                                case '212.24.144.188':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '212.26.':
                             switch ($client_ip_address) {
                                case '212.26.245.34':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '212.47.':
                             switch ($client_ip_address) {
                                case '212.47.226.184':
                                   $bIPIsTor = True;
                                   break;
                                case '212.47.227.72':
                                   $bIPIsTor = True;
                                   break;
                                case '212.47.230.239':
                                   $bIPIsTor = True;
                                   break;
                                case '212.47.233.13':
                                   $bIPIsTor = True;
                                   break;
                                case '212.47.240.182':
                                   $bIPIsTor = True;
                                   break;
                                case '212.47.242.45':
                                   $bIPIsTor = True;
                                   break;
                                case '212.47.243.140':
                                   $bIPIsTor = True;
                                   break;
                                case '212.47.246.21':
                                   $bIPIsTor = True;
                                   break;
                                case '212.47.252.134':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '212.68.':
                             switch ($client_ip_address) {
                                case '212.68.46.2':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '212.83.':
                             switch ($client_ip_address) {
                                case '212.83.40.238':
                                   $bIPIsTor = True;
                                   break;
                                case '212.83.40.239':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '212.92.':
                             switch ($client_ip_address) {
                                case '212.92.219.15':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '212.112.':
                             switch ($client_ip_address) {
                                case '212.112.133.92':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '212.117.':
                             switch ($client_ip_address) {
                                case '212.117.180.21':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '212.227.':
                             switch ($client_ip_address) {
                                case '212.227.20.116':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                       }
                       break; // break ip address 0
                    case '213':
                       switch ($client_ip_address1) { 
                          case '213.21.':
                             switch ($client_ip_address) {
                                case '213.21.123.232':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '213.61.':
                             switch ($client_ip_address) {
                                case '213.61.149.100':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '213.95.':
                             switch ($client_ip_address) {
                                case '213.95.21.54':
                                   $bIPIsTor = True;
                                   break;
                                case '213.95.21.59':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '213.108.':
                             switch ($client_ip_address) {
                                case '213.108.105.71':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '213.109.':
                             switch ($client_ip_address) {
                                case '213.109.127.39':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '213.122.':
                             switch ($client_ip_address) {
                                case '213.122.114.52':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '213.126.':
                             switch ($client_ip_address) {
                                case '213.126.78.59':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '213.136.':
                             switch ($client_ip_address) {
                                case '213.136.71.21':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '213.151.':
                             switch ($client_ip_address) {
                                case '213.151.89.4':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '213.163.':
                             switch ($client_ip_address) {
                                case '213.163.71.135':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '213.186.':
                             switch ($client_ip_address) {
                                case '213.186.7.232':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '213.187.':
                             switch ($client_ip_address) {
                                case '213.187.247.93':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                       }
                       break; // break ip address 0
                    case '216':
                       switch ($client_ip_address1) { 
                          case '216.17.':
                             switch ($client_ip_address) {
                                case '216.17.99.183':
                                   $bIPIsTor = True;
                                   break;
                                case '216.17.101.79':
                                   $bIPIsTor = True;
                                   break;
                                case '216.17.110.252':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '216.115.':
                             switch ($client_ip_address) {
                                case '216.115.3.26':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '216.218.':
                             switch ($client_ip_address) {
                                case '216.218.134.12':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                       }
                       break; // break ip address 0
                    case '217':
                       switch ($client_ip_address1) { 
                          case '217.12.':
                             switch ($client_ip_address) {
                                case '217.12.204.104':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '217.23.':
                             switch ($client_ip_address) {
                                case '217.23.7.25':
                                   $bIPIsTor = True;
                                   break;
                                case '217.23.7.79':
                                   $bIPIsTor = True;
                                   break;
                                case '217.23.7.98':
                                   $bIPIsTor = True;
                                   break;
                                case '217.23.7.99':
                                   $bIPIsTor = True;
                                   break;
                                case '217.23.11.95':
                                   $bIPIsTor = True;
                                   break;
                                case '217.23.11.97':
                                   $bIPIsTor = True;
                                   break;
                                case '217.23.11.98':
                                   $bIPIsTor = True;
                                   break;
                                case '217.23.14.168':
                                   $bIPIsTor = True;
                                   break;
                                case '217.23.14.190':
                                   $bIPIsTor = True;
                                   break;
                                case '217.23.86.150':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '217.34.':
                             switch ($client_ip_address) {
                                case '217.34.135.230':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '217.70.':
                             switch ($client_ip_address) {
                                case '217.70.191.13':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '217.75.':
                             switch ($client_ip_address) {
                                case '217.75.208.131':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break; // break ip addres 1
                          case '217.115.':
                             switch ($client_ip_address) {
                                case '217.115.10.131':
                                   $bIPIsTor = True;
                                   break;
                                case '217.115.10.133':
                                   $bIPIsTor = True;
                                   break;
                                case '217.115.10.134':
                                   $bIPIsTor = True;
                                   break;
                             }
                             break;
                       }
                       break;
                 }
                 break;
           }
           break;
        }
        
    }
    return $bIPIsTor;
}




?>
