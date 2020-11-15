<?php
/*
                            _
   ____                    | |
  / __ \__      _____  _ __| | __ ____
 / / _` \ \ /\ / / _ \| '__| |/ /|_  /
| | (_| |\ V  V / (_) | |  |   <  / /
 \ \__,_| \_/\_/ \___/|_|  |_|\_\/___|
  \____/

        http://www.atworkz.de
           info@atworkz.de
_______________________________________

       Screenly OSE Monitoring
             Settings Site
_______________________________________
*/

// TRANSLATION CLASS
require_once('translation.php');
use Translation\Translation;
Translation::setLocalesDir(__DIR__ . '/../locales');

// Public Access Link
if(isset($_GET['generateToken']) && $_GET['generateToken'] == 'yes' && getGroupID($loginUserID) == 1){
  $now 	 = time();
  $token = md5($loginUsername.$loginPassword.$now);

  if($token){
    $db->exec("UPDATE settings SET token='".$token."' WHERE settingsID='1'");
    sysinfo('success', Translation::of('msg.new_token_generated'));
    redirect($backLink);
  } else sysinfo('danger', 'Error!');
}

if(isset($_GET['view']) && $_GET['view'] == 'profile'){
  echo '
  <div class="container-xl">
    <div class="page-header">
      <div class="row align-items-center">
        <div class="col-auto">
          <h2 class="page-title">
            Profile Settings
          </h2>
          <ol class="breadcrumb breadcrumb-arrows" aria-label="breadcrumbs">
            <li class="breadcrumb-item"><a href="index.php?site=settings">Settings</a></li>
            <li class="breadcrumb-item active" aria-current="page"><a href="index.php?site=settings&view=profile">Profile Settings</a></li>
          </ol>
        </div>
        <div class="col-auto ml-auto d-print-none">
        </div>
      </div>
    </div>
    <div class="row justify-content-center">
      <div class="d-none d-lg-block col-lg-3 order-lg-1 mb-4">
        <div class="sticky-top">
          <div class="card">
            <div class="card-body text-center">
              <div class="mb-3">
                <span class="avatar avatar-xl">
                  '.$loginFirstname[0].$loginName[0].'
                </span>
              </div>
              <div class="card-title mb-1">'.$loginFullname.'</div>
              <div class="text-muted">'.$loginGroupName.'</div>
            </div>
          </div>
          <h5 class="subheader">On this page</h5>
          <ul class="list-unstyled">
            <li class="toc-entry toc-h2"><a href="#personal">Personal Settings</a></li>
            <li class="toc-entry toc-h2"><a href="#account">Account Settings</a></li>
          </ul>
        </div>
      </div>
      <div class="col-lg-9">
        <div class="card card-lg">
          <form id="accountForm" action="'.$_SERVER['REQUEST_URI'].'" method="POST" data-toggle="validator">
            <div class="card-body">
            <h2 id="personal">Personal</h2>
              <div class="form-group mb-3 row">
                <label class="form-label col-3 col-form-label">'.Translation::of('firstname').'</label>
                <div class="col">
                  <input name="firstname" type="text" class="form-control" id="InputFirstname" placeholder="John" value="'.$loginFirstname.'" />
                </div>
              </div>
              <div class="form-group mb-3 row">
                <label class="form-label col-3 col-form-label">'.Translation::of('name').'</label>
                <div class="col">
                  <input name="name" type="text" class="form-control" id="InputName" placeholder="Doe" value="'.$loginName.'" />
                </div>
              </div>
              <hr />
              <h2 id="account">Account</h2>
              <div class="form-group mb-3 row">
                <label class="form-label col-3 col-form-label">'.Translation::of('change_username').'</label>
                <div class="col">
                  <input name="username" type="text" class="form-control" id="InputUsername" placeholder="'.Translation::of('new_username').'" value="'.$loginUsername.'" />
                  <div class="help-block with-errors"></div>
                </div>
              </div>
              <div class="form-group mb-3 row">
                <label class="form-label col-3 col-form-label">'.Translation::of('change_username').'</label>
                <div class="col">
                  <input name="password1" type="password" class="form-control" id="InputPassword1" placeholder="'.Translation::of('new_password').'" />
                </div>
              </div>
              <div class="form-group mb-3 row">
                <label class="form-label col-3 col-form-label">'.Translation::of('change_username').'</label>
                <div class="col">
                <input name="password2" type="password" class="form-control" id="InputPassword2" placeholder="'.Translation::of('confirm_password').'" data-match="#InputPassword1" data-match-error="Whoops, these don\'t match" />
                <div class="help-block with-errors"></div>
                </div>
              </div>
            </div>
            <div class="card-footer d-flex align-items-center">
              <a href="index.php?site=settings" class="btn btn-link mr-auto">'.Translation::of('cancel').'</a>
              <button type="submit" name="saveAccount" class="btn btn-primary">'.Translation::of('update').'</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  ';
}
else if(isset($_GET['view']) && $_GET['view'] == 'system'){
  //// TODO: Design and Timezone + Systeminformation
  echo '
  <div class="container-xl">
    <div class="page-header">
      <div class="row align-items-center">
        <div class="col-auto">
          <h2 class="page-title">
            System Settings
          </h2>
          <ol class="breadcrumb breadcrumb-arrows" aria-label="breadcrumbs">
            <li class="breadcrumb-item"><a href="index.php?site=settings">Settings</a></li>
            <li class="breadcrumb-item active" aria-current="page"><a href="index.php?site=settings&view=system">System Settings</a></li>
          </ol>
        </div>
        <div class="col-auto ml-auto d-print-none"></div>
      </div>
    </div>
    <div class="row justify-content-center">
      <div class="d-none d-lg-block col-lg-3 order-lg-1 mb-4">
        <div class="sticky-top">
          <div class="card">
            <div class="card-body text-center">
              <div class="mb-3">
                <span class="avatar avatar-xl">
                  '.$loginFirstname['0'].$loginName['0'].'
                  </span>
              </div>
              <div class="card-title mb-1">'.$loginFullname.'</div>
              <div class="text-muted">'.$loginGroupName.'</div>
            </div>
          </div>
          <h5 class="subheader">On this page</h5>
          <ul class="list-unstyled">
            <li class="toc-entry toc-h2"><a href="#system">System Settings</a></li>
            <li class="toc-entry toc-h2"><a href="#player">Player Control Settings</a></li>
          </ul>
        </div>
      </div>
      <div class="col-lg-9">
        <div class="card card-lg">
          <div class="card-body">
            <form id="settingsForm" action="'.$_SERVER['REQUEST_URI'].'" method="POST" data-toggle="validator">
              <h2 id="system">System</h2>
              <div class="form-group mb-3 row">
                <label class="form-label col-3 col-form-label">'.Translation::of('title').'</label>
                <div class="col">
                  <input name="name" type="text" class="form-control" id="InputSetName" placeholder="'.Translation::of('somo').'" value="'.$set['name'].'" required />
                </div>
              </div>
              <div class="form-group mb-3 row">
                <label class="form-label col-3 col-form-label">'.Translation::of('timezone').'</label>
                <div class="col">
                  <select class="form-select" name="timezone" placeholder="Type to search...">
                    '.timezone($set['timezone']).'
                  </select>
                </div>
              </div>
              <div class="form-group mb-3 row">
                <label class="form-label col-3 col-form-label">'.Translation::of('design').'</label>
                <div class="col">
                  <div class="row row-sm">
                    <div class="col-auto">
                      <label class="form-colorinput form-colorinput-light align-middle">
                        <input name="color" type="radio" name="design" value="0" class="form-colorinput-input" '.($set['design'] == '0' ? 'checked' : '').'>
                        <span class="form-colorinput-color bg-white"></span>
                      </label>
                      Light Mode
                    </div>
                    <div class="col-auto">
                      <label class="form-colorinput align-middle ml-5">
                        <input name="color" type="radio" name="design" value="1" class="form-colorinput-input" '.($set['design'] == '1' ? 'checked' : '').'>
                        <span class="form-colorinput-color bg-dark"></span>
                      </label>
                      Dark Mode
                    </div>
                  </div>
                </div>
              </div>
              <hr />
              <h2 id="player">Player Control</h2>
              <div class="form-group mb-3 row">
                <label class="form-label col-3 col-form-label">'.Translation::of('refresh_time_player').'</label>
                <div class="col">
                  <input name="refreshscreen" type="text" class="form-control" id="InputSetRefresh" placeholder="5" value="'.$loginRefreshTime.'" required />
                </div>
              </div>
              <div class="form-group mb-3 row">
                <label class="form-label col-3 col-form-label">'.Translation::of('delay_of_weeks').'</label>
                <div class="col">
                  <input name="end_date" type="text" class="form-control" id="InputSetEndDate" placeholder="1" value="'.$set['end_date'].'" required />
                </div>
              </div>
              <div class="form-group mb-3 row">
                <label class="form-label col-3 col-form-label">'.Translation::of('assets_duration').'</label>
                <div class="col">
                  <input name="duration" type="text" class="form-control" id="InputSetDuration" placeholder="30" value="'.$set['duration'].'" required />
                </div>
              </div>
            </div>
            <div class="card-footer d-flex align-items-center">
              <a href="index.php?site=settings" class="btn btn-link mr-auto">'.Translation::of('cancel').'</a>
              <button type="submit" name="saveSettings" class="btn btn-primary">'.Translation::of('update').'</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  ';
}
else if(isset($_GET['view']) && $_GET['view'] == 'publicaccess'){

  $tokenLink = 'http://'.$_SERVER['SERVER_ADDR'].':'.$_SERVER['SERVER_PORT'].'/_public.php?key='.$set['token'];

  echo '
  <div class="container-xl">
    <div class="page-header">
      <div class="row align-items-center">
        <div class="col-auto">
          <h2 class="page-title">
            Public Access Settings
          </h2>
          <ol class="breadcrumb breadcrumb-arrows" aria-label="breadcrumbs">
            <li class="breadcrumb-item"><a href="index.php?site=settings">Settings</a></li>
            <li class="breadcrumb-item active" aria-current="page"><a href="index.php?site=settings&view=publicaccess">Public Access Settings</a></li>
          </ol>
        </div>
        <div class="col-auto ml-auto d-print-none">
        </div>
      </div>
    </div>

    <div class="row justify-content-center">
      <div class="col-lg-3 order-lg-1 mb-4">
        <div class="sticky-top">
          <div class="card">
            <div class="card-body text-center">
              <button class="btn btn-outline-info btn-block mb-2" id="open_token">Open in new window</button>
              <button class="btn btn-outline-secondary btn-block mb-2" id="add_dark">Activate Darkmode</button>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-9">
        <div class="card card-lg">
          <form id="settingsForm" action="'.$_SERVER['REQUEST_URI'].'" method="POST" data-toggle="validator">
            <div class="card-body">
              <div class="form-group">
                <label for="InputSetName">'.Translation::of('public_access_link').'</label>
                <input type="text" class="form-control" id="InputSetToken" onClick="this.select();" value="'.$tokenLink.'" />
              </div>
            </div>
            <div class="card-footer d-flex align-items-center">
              <a href="index.php?site=settings" class="btn btn-link mr-auto">'.Translation::of('cancel').'</a>
              <a href="index.php?site=settings&view=publicaccess&generateToken=yes" class="btn btn-primary">'.Translation::of('generate_token').'</a>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  ';
}
else if(isset($_GET['view']) && $_GET['view'] == 'log'){
  if(isset($_GET['action']) && $_GET['action'] == 'reset'){
    systemLog('Settings', 'Admin Log: Start Log reset', $loginUserID, 0);
    $db->exec("DELETE FROM log");
    //sysinfo('success', Translation::of('msg.player_delete_successfully'));
    redirect($backLink, 0);
  }
  else {
    $logSQL = $db->query("SELECT * FROM `log` ORDER BY logTime");
    echo '
    <div class="container-xl">
      <div class="page-header">
        <div class="row align-items-center">
          <div class="col-auto">
            <h2 class="page-title">
              Admin Log
            </h2>
            <ol class="breadcrumb breadcrumb-arrows" aria-label="breadcrumbs">
              <li class="breadcrumb-item"><a href="index.php?site=settings">Settings</a></li>
              <li class="breadcrumb-item active" aria-current="page"><a href="index.php?site=settings&view=log">Admin Log</a></li>
            </ol>
          </div>
          <div class="col-auto ml-auto">
            <a href="#" data-toggle="modal" data-target="#confirmDeleteLog" data-href="index.php?site=settings&view=log&action=reset" class="btn btn-danger"  title="delete">
              Reset Log
            </a>
          </div>
        </div>
      </div>

      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Log Data</h3>
        </div>
        <div class="card-body border-bottom py-3">
          <div class="d-flex">
            <div class="text-muted">
              Show
              <div class="mx-2 d-inline-block">
                <select class="form-select form-select-sm" id="logLength_change">
                <option value="10">10</option>
                <option value="25">25</option>
                <option value="50">50</option>
                <option value="100">100</option>
                <option value="-1">All</option>
                </select>
              </div>
              entries
            </div>
            <div class="ml-auto text-muted">
              Search:
              <div class="ml-2 d-inline-block">
                <input type="text" class="form-control form-control-sm" id="logSearch">
              </div>
            </div>
          </div>
        </div>
        <div class="table-responsive">

      <table class="table vertical-center" id="log">
        <thead class="text-primary">
          <tr>
            <th>Log Time</th>
            <th>User</th>
            <th>Modul</th>
            <th>Info</th>
          </tr>
        </thead>
        <tbody>
            ';
        while($log = $logSQL->fetchArray(SQLITE3_ASSOC)){
          if($log['userID'] == 0) $user = 'SYSTEM';
          else $user = getUserName($log['userID']);
          echo '
            <tr>
              <td>'.date('Y-m-d H:i:s', $log['logTime']).'</td>
              <td>'.$user.'</td>
              <td><span class="badge bg-secondary p-1">  '.$log['moduleName'].'  </span></td>
              <td>'.$log['info'].'</td>
            </tr>
                ';
        }
    echo '
        </tbody>
      </table>
    </div>
    <div class="card-footer d-flex align-items-center">
      <p class="m-0 text-muted" id="dataTables_info"></p>
      <span class="pagination m-0 ml-auto" id="dataTables_paginate"></span>
    </div>
    ';
    echo '

  </div>
</div>
<!-- confirmDeleteLog -->
<div class="modal modal-blur fade" id="confirmDeleteLog" tabindex="-1" role="dialog" aria-labelledby="confirmDeleteLog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">'.Translation::of('attention').'!</h5>
      </div>
      <div class="modal-body">
        Do you really want to reset the log files?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-link mr-auto" data-dismiss="modal">'.Translation::of('cancel').'</button>
        <a class="btn btn-danger btn-ok">'.Translation::of('delete').'</a>
      </div>
    </div>
  </div>
</div>
    ';
  }
}
else {
  echo '
  <div class="container-xl">
    <div class="page-header">
      <div class="row align-items-center">
        <div class="col-auto">
          <h2 class="page-title">
            Settings
          </h2>
        </div>
        <div class="col-auto ml-auto d-print-none">
        </div>
      </div>
    </div>
    <div class="row">
    '.$update_info.'
    </div>
    <div class="row row-deck">
      <div class="col">
        <div class="card">
          <a href="index.php?site=settings&view=profile">
            <div class="card-body text-center">
              <div class="mb-3">
                <span class="avatar avatar-xl"><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-md" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z"></path><circle cx="12" cy="7" r="4"></circle><path d="M5.5 21v-2a4 4 0 0 1 4 -4h5a4 4 0 0 1 4 4v2"></path></svg></span>
              </div>
              <div class="card-title mb-1">Profile Settings</div>
              <div class="text-muted">Name, Login, Design</div>
            </div>
          </a>
        </div>
      </div>';
      if($loginGroupID == 1){
      echo'
      <div class="col-md-6">
        <div class="card">
          <a href="index.php?site=settings&view=system">
            <div class="card-body text-center">
              <div class="mb-3">
                <span class="avatar avatar-xl">
                  <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-md" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z"></path><path d="M7 10h3v-3l-3.5 -3.5a6 6 0 0 1 8 8l6 6a2 2 0 0 1 -3 3l-6-6a6 6 0 0 1 -8 -8l3.5 3.5"></path></svg>
                </span>
              </div>
              <div class="card-title mb-1">System Settings</div>
              <div class="text-muted">API Settings, Default Settings, Design</div>
            </div>
          </div>
        </a>
      </div>
    </div>
    <div class="row row-deck">
      <div class="col-md-6 col-xl-3">
        <div class="card">
          <a href="index.php?site=settings&view=publicaccess">
            <div class="card-body text-center">
              <div class="mb-3">
                <span class="avatar avatar-xl">
                  <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-md" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z"></path><circle cx="12" cy="12" r="9"></circle><line x1="3.6" y1="9" x2="20.4" y2="9"></line><line x1="3.6" y1="15" x2="20.4" y2="15"></line><path d="M11.5 3a17 17 0 0 0 0 18"></path><path d="M12.5 3a17 17 0 0 1 0 18"></path></svg>
                </span>
              </div>
              <div class="card-title mb-1">Public Access Settings</div>
              <div class="text-muted">Design, Link</div>
            </div>
          </div>
        </a>
      </div>
      <div class="col-md-6 col-xl-3">
        <div class="card">
          <a href="index.php?site=settings&view=log">
            <div class="card-body text-center">
              <div class="mb-3">
                <span class="avatar avatar-xl">
                  <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-md" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z"></path><path d="M16 6h3a1 1 0 0 1 1 1v11a2 2 0 0 1 -4 0v-13a1 1 0 0 0 -1 -1h-10a1 1 0 0 0 -1 1v12a3 3 0 0 0 3 3h11"></path><line x1="8" y1="8" x2="12" y2="8"></line><line x1="8" y1="12" x2="12" y2="12"></line><line x1="8" y1="16" x2="12" y2="16"></line></svg>
                </span>
              </div>
              <div class="card-title mb-1">Admin Logs</div>
              <div class="text-muted">Protocols, Activities</div>
            </div>
          </div>
        </a>
      </div>
      <div class="col-md-6 col-xl-3">
        <div class="card">
          <a href="index.php?site=usermanagement">
            <div class="card-body text-center">
              <div class="mb-3">
                <span class="avatar avatar-xl">
                  <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-md" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z"></path><line x1="9.5" y1="11" x2="9.51" y2="11"></line><line x1="14.5" y1="11" x2="14.51" y2="11"></line><path d="M9.5 15a3.5 3.5 0 0 0 5 0"></path><path d="M7 5h1v-2h8v2h1a3 3 0 0 1 3 3v9a3 3 0 0 1 -3 3v1h-10v-1a3 3 0 0 1 -3 -3v-9a3 3 0 0 1 3 -3"></path></svg>
                </span>
              </div>
              <div class="card-title mb-1">User Settings</div>
              <div class="text-muted">Create, Edit, Remove</div>
            </div>
          </div>
        </a>
      </div>
      <div class="col-md-6 col-xl-3">
        <div class="card">
          <a href="#">
            <div class="card-body text-center">
              <div class="mb-3">
                <span class="avatar avatar-xl">
                  <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-md" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z"></path><rect x="5" y="11" width="14" height="10" rx="2"></rect><circle cx="12" cy="16" r="1"></circle><path d="M8 11v-5a4 4 0 0 1 8 0"></path></svg>
                </span>
              </div>
              <div class="card-title mb-1">Group Settings</div>
              <div class="text-muted">Create Groups, Add Members</div>
            </div>
          </div>
        </a>
      </div>
    </div>';
  }
  echo'
  </div>
  ';
}
