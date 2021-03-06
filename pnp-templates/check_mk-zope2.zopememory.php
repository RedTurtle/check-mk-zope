<?php
# VmPeak:530255872,VmSize:530251776,VmLck:0,VmHWM:243642368,VmRSS:243634176,VmData:252669952,VmStk:397312,VmExe:2215936,VmLib:9801728,VmPTE:827392
# TODO: .../buildout/parts/instance/etc/zope.conf
$parts = explode("_", $servicedesc);
$instance = $parts[sizeof($parts) - 3];

$opt[1] = "--title \"Zope memory For $hostname / $instance\" ";

#
$def[1] =  "".
           "DEF:VmPeak=$RRDFILE[1]:$DS[1]:AVERAGE ".
           "CDEF:VmPeak_mb=VmPeak,1048576,/ ".
           rrd::area("VmPeak_mb",rrd::color(1),"Peak ","STACK").
           "GPRINT:VmPeak_mb:LAST:\"%8.1lf MB LAST\" ".
           "GPRINT:VmPeak_mb:AVERAGE:\"%8.1lf MB AVERAGE\" ".
           "GPRINT:VmPeak_mb:MAX:\"%8.1lf MB MAX\\n\" ".

           "DEF:VmSize=$RRDFILE[2]:$DS[2]:AVERAGE ".
           "CDEF:VmSize_mb=VmSize,1048576,/ ".
           rrd::area("VmSize_mb",rrd::color(2),"Size ","STACK").
           "GPRINT:VmSize_mb:LAST:\"%8.1lf MB LAST\" ".
           "GPRINT:VmSize_mb:AVERAGE:\"%8.1lf MB AVERAGE\" ".
           "GPRINT:VmSize_mb:MAX:\"%8.1lf MB MAX\\n\" ".

           "DEF:VmLck=$RRDFILE[3]:$DS[3]:AVERAGE ".
           "CDEF:VmLck_mb=VmLck,1048576,/ ".
           rrd::area("VmLck_mb",rrd::color(3),"Lck  ","STACK").
           "GPRINT:VmLck_mb:LAST:\"%8.1lf MB LAST\" ".
           "GPRINT:VmLck_mb:AVERAGE:\"%8.1lf MB AVERAGE\" ".
           "GPRINT:VmLck_mb:MAX:\"%8.1lf MB MAX\\n\" ".

           "DEF:VmHWM=$RRDFILE[4]:$DS[4]:AVERAGE ".
           "CDEF:VmHWM_mb=VmHWM,1048576,/ ".
           rrd::area("VmHWM_mb",rrd::color(4),"HWM  ","STACK").
           "GPRINT:VmHWM_mb:LAST:\"%8.1lf MB LAST\" ".
           "GPRINT:VmHWM_mb:AVERAGE:\"%8.1lf MB AVERAGE\" ".
           "GPRINT:VmHWM_mb:MAX:\"%8.1lf MB MAX\\n\" ".

           "DEF:VmRSS=$RRDFILE[5]:$DS[5]:AVERAGE ".
           "CDEF:VmRSS_mb=VmRSS,1048576,/ ".
           rrd::area("VmRSS_mb",rrd::color(5),"RSS  ","STACK").
           "GPRINT:VmRSS_mb:LAST:\"%8.1lf MB LAST\" ".
           "GPRINT:VmRSS_mb:AVERAGE:\"%8.1lf MB AVERAGE\" ".
           "GPRINT:VmRSS_mb:MAX:\"%8.1lf MB MAX\\n\" ".

           "DEF:VmData=$RRDFILE[6]:$DS[6]:AVERAGE ".
           "CDEF:VmData_mb=VmData,1048576,/ ".
           rrd::area("VmData_mb",rrd::color(6),"Data ","STACK").
           "GPRINT:VmData_mb:LAST:\"%8.1lf MB\\n\" ".

           "DEF:VmStk=$RRDFILE[7]:$DS[7]:AVERAGE ".
           "CDEF:VmStk_mb=VmStk,1048576,/ ".
           rrd::area("VmStk_mb",rrd::color(7),"Stk ","STACK").
           "GPRINT:VmStk_mb:LAST:\"%8.1lf MB\\n\" ".

           "DEF:VmExe=$RRDFILE[8]:$DS[8]:AVERAGE ".
           "CDEF:VmExe_mb=VmExe,1048576,/ ".
           rrd::area("VmExe_mb",rrd::color(8),"Exe ","STACK").
           "GPRINT:VmExe_mb:LAST:\"%8.1lf MB\\n\" ".

           "DEF:VmLib=$RRDFILE[9]:$DS[9]:AVERAGE ".
           "CDEF:VmLib_mb=VmLib,1048576,/ ".
           rrd::area("VmLib_mb",rrd::color(9),"Lib ","STACK").
           "GPRINT:VmLib_mb:LAST:\"%8.1lf MB\\n\" ".

           "DEF:VmPTE=$RRDFILE[10]:$DS[10]:AVERAGE ".
           "CDEF:VmPTE_mb=VmPTE,1048576,/ ".
           rrd::area("VmPTE_mb",rrd::color(10),"PTE ","STACK").
           "GPRINT:VmPTE_mb:LAST:\"%8.1lf MB\\n\" ".

           "";
?>
