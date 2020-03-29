<?php

namespace App\Http\Controllers;

use Djoudi\Bigbluebutton\Contracts\Meeting;
use BigBlueButton\Parameters\CreateMeetingParameters;
use BigBlueButton\Parameters\JoinMeetingParameters;
use BigBlueButton\Parameters\EndMeetingParameters;
use App\User;
use Illuminate\Http\Request;


class LiveController extends Controller
{

      /**
     * @var \Djoudi\Bigbluebutton\Contracts\Meeting
     */
    protected $meeting;

    public function __construct(Meeting $meeting)
    {
        $this->meeting = $meeting;
    }


    public function index()
    {
         $ids = User::find(\Auth::id());

      
        $meetings = $this->meeting->all();
        if ($meetings) {
            return view("dgrh.live",compact(["meetings"]));
        }
       return view('dgrh.live');
    }



     public function all()
    {

        $meetings = $this->meeting->all();
        if ($meetings) {
            return view("admin.meeting.index",compact("meetings"));
        }

    }

  /*   public function create()
    {
        $courses = Course::all();
        return view("admin.meeting.edit",compact('courses'));
   } */
    public function store(Request $request)
    {
        $year = date('Y');
        $meetingid = $request->name."-$year";
        $meetingParams = new CreateMeetingParameters($meetingid, $request->name);
        $meetingParams->setRecord(true);
        $meetingParams->setAllowStartStopRecording(true);
        $meetingParams->setAutoStartRecording(true);
        $meetingParams->setMaxParticipants(48);
        $meetingParams->setDuration(360);
        $meetingParams->setModeratorPassword('Admin@2030');
        $meetingParams->setAttendeePassword('MICLAT@2020');
        $meetingParams->setWebcamsOnlyForModerator(true);
        $meetingParams->setCopyright("منصة تواصل");
        $meetingParams->setMuteOnStart(true);
        $meetingParams->setFreeJoin(false);

        if ($this->meeting->create($meetingParams)) {
            return redirect('lives');
            // Meeting was created
        }
    }

    public function goMeeting()
    {

        return view("admin.meeting.join");
    }

    /**
     * @param Request $request
     */
    public function join(Request $request)
    {
        if (auth()->user()->hasPermissionTo('View Live Admin')) {
           $meetingParams = new JoinMeetingParameters($request->meetingID, $request->meetingName, 'Admin@2030');
        }else {
            $meetingParams = new JoinMeetingParameters($request->meetingID, $request->meetingName, 'MICLAT@2020');
        }
        
        $meetingParams->setRedirect(true);
        $meetingUrl = $this->meeting->join($meetingParams);
        //header("Location:"+$meetingUrl);
        if (!headers_sent()) {
            header("Location: $meetingUrl");
            exit;
        }
       // redirect()->setTargetUrl($meetingUrl);
    }


    public function close(Request $request)
    {

        $meetingParams = new EndMeetingParameters($request->meetingID, $request->moderator_password);
        $this->meeting->close($meetingParams);
          return redirect('formateur/live');
    }
}