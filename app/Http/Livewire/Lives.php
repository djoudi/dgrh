<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Djoudi\Bigbluebutton\Contracts\Meeting;
use BigBlueButton\Parameters\EndMeetingParameters;
use BigBlueButton\Parameters\JoinMeetingParameters;
use BigBlueButton\Parameters\CreateMeetingParameters;

class Lives extends Component
{

    public $meets;
    protected $meeting;


    public function mount(Meeting $meeting)
    {
        $this->meeting = $meeting;
    }
    public function render()
    {

        return view('livewire.lives');
    }

    public function all()
    {

       // $this->meets = Meeting::all();

        //$meetings = $this->meeting->all();
        // if ($meetings) {
        return $this->meeting;
        // }
    }

    public function create()
    {
        $year = date('Y');
        $meetingid = "Miclat-$year";
        $meetingParams = new CreateMeetingParameters($meetingid, "MICLAT Test");
        return $meetingParams;
        $meetingParams->setRecord(true);
        $meetingParams->setAllowStartStopRecording(true);
        $meetingParams->setAutoStartRecording(true);
        $meetingParams->setMaxParticipants(500);
        $meetingParams->setDuration(180);
        $meetingParams->setModeratorPassword('Tawassol@2020');
        return $meetingParams;

        if ($this->meeting->create($meetingParams)) {
            dd("ok created");
            // Meeting was created
        }
    }

    public function join(Request $request)
    {
        $meetingParams = new JoinMeetingParameters($request->meetingID, $request->meetingName, 'Tawassol@2020');
        $meetingParams->setRedirect(true);
        $meetingUrl = $this->meeting->join($meetingParams);
        //header("Location:"+$meetingUrl);
        if (!headers_sent()) {
            header("Location: $meetingUrl");
            exit;
        }
    }

    public function close(Request $request)
    {
        $meetingParams = new EndMeetingParameters($request->meetingID, $request->moderator_password);
        $this->meeting->close($meetingParams);
    }
}