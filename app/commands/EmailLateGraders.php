<?php

use Indatus\Dispatcher\Scheduling\ScheduledCommand;
use Indatus\Dispatcher\Scheduling\Schedulable;
use Indatus\Dispatcher\Drivers\Cron\Scheduler;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

class EmailLateGraders extends ScheduledCommand {

	/**
	 * The console command name.
	 *
	 * @var string
	 */
	protected $name = 'edu:email_late_graders';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Email graders about their assignment deadlines.';

	/**
	 * Create a new command instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		parent::__construct();
	}

	/**
	 * When a command should run
	 *
	 * @param Scheduler $scheduler
	 * @return \Indatus\Dispatcher\Scheduling\Schedulable
	 */
	public function schedule(Schedulable $scheduler)
	{
		return $scheduler;
	}

	/**
	 * Execute the console command.
	 *
	 * @return mixed
	 */
	public function fire()
	{

        $evaluations_all = Evaluation::where('beta_grade', '=', 0)
                                ->orWhere('gama_grade', '=', 0)
                                ->orWhere('delta_grade', '=', 0)
                                ->orWhere('epsilon_grade', '=', 0)
                                ->orWhere('st_grade', '=', 0)
                                ->get();

        $today = new DateTimeImmutable('NOW');

        foreach($evaluations_all as $evaluation){

        	$assigned_until = new DateTimeImmutable($evaluation->assigned_until);

            $days_diff = $today->diff($assigned_until)->format('%R%a');

            if($days_diff == '+0' || $days_diff == '-0') {
                $grader_id = $evaluation->grader_id;
                $grader = Grader::find($grader_id);
                $site = Site::find($evaluation->site_id);
                $site_sitle = $site->title;
                $site_url = $site->site_url;
                $grader_email = $grader->user->email;
                $grader_last_name = $grader->grader_last_name;
                $grader_first_name = $grader->grader_name;
                
                $new_date = $today->modify('+2 days');
                $new_date_formatted = $new_date->format('d / m / Y');
                
                Mail::send('emails.expires_today',['grader_last_name' => $grader_last_name, 'grader_first_name' => $grader_first_name, 'site_sitle' => $site_sitle, 'site_url' => $site_url, 'new_date_formatted' => $new_date_formatted], function($message) use ($grader_email){
                    $message->to($grader_email)->subject('ΠΑΡΑΤΑΣΗ ΓΙΑ ΟΛΟΚΛΗΡΩΣΗ ΚΡΙΣΗΣ - Edu Web Awards 2015');
                });
            }

            if($days_diff == '+2'){
                $grader_id = $evaluation->grader_id;
                $grader = Grader::find($grader_id);
                $site = Site::find($evaluation->site_id);
                $site_sitle = $site->title;
                $site_url = $site->site_url;
                $grader_email = $grader->user->email;
                $grader_last_name = $grader->grader_last_name;
                $grader_first_name = $grader->grader_name;

                $assigned_until_formatted = $assigned_until->format('d / m / Y');

                Mail::send('emails.expires_in_two_days',['grader_last_name' => $grader_last_name, 'grader_first_name' => $grader_first_name, 'site_sitle' => $site_sitle, 'site_url' => $site_url, 'assigned_until_formatted' => $assigned_until_formatted], function($message) use ($grader_email){
                    $message->to($grader_email)->subject('ΥΠΕΝΘΥΜΙΣΗ ΓΙΑ ΟΛΟΚΛΗΡΩΣΗ ΚΡΙΣΗΣ - Edu Web Awards 2015');
                });
            }

        } // end foreach

	}

}
