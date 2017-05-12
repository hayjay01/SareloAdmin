<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Carbon\Carbon;

class Slot extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'slots';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['time_range', 'slot_available', 'day_of_week'];

    public function OrderSlot()
    {
        return $this->hasMany('App\Models\OrderSlot');
    }

    public static function getAvailableSlot($date, $day)
    {
        $all_slots = self::where('day_of_week', $day)->get();

        $slots = [];

        foreach ($all_slots as $slot) {
            $result = \DB::select("SELECT count(id) as count from order_slots
                            where slot_id=:slot_id AND delivery_date=:datum OR delivery_date is null", ["datum" =>date('Y-m-d', strtotime($date)), "slot_id" => $slot->id]);

            $slot = $slot->toArray();
            $slot['used_count'] = $result[0]->count;
            $slots[] = (object) $slot;
        }


        return $slots;
    }

    public static function getDeliveryDays($no_of_days = 5)
    {
        $slot = new static;
        $slot_items = [];

        $dayMap = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];

        $days_obj = $slot->distinct()->select('day_of_week')->orderby('day_of_week', 'asc')->get();


        $days_obj->map(function ($slot_day) use (&$slot_items){
            $slot_items[] = $slot_day['day_of_week'];
        });

        if(collect($slot_items)->count() > 0){

            $start_point = array_search(intval(date('N', strtotime('today'))), $slot_items);
            $start_week = array_slice($slot_items, $start_point);
            $days_series = self::continuum($slot_items, 7, $start_week);

            foreach ($days_series as $key => $day) {
                $days[] = $day;
            }
            $curr_arr = [];
            foreach ($days as $key => $day) {
                $curr_arr[] = $day;

                $occurence = array_count_values($curr_arr);

                $occurence = isset($occurence[$day])? $occurence[$day]: 0;

                if($key == 0 && $day == date('N', strtotime('today'))){
                    $date = date('Y-m-d');
                }
                // else if ($key != 0 && $day != date('N', strtotime('today'))){
                //     dd("here");
                // }
                else {

                    $date = date('Y-m-d', strtotime("$occurence $dayMap[$day]"));
                }


                $new_obj[] = ['day_int' => $day,
                                'day_w' => $dayMap[$day],
                                'occurence' => $occurence,
                                'date' => $date
                            ];
            }
            $days = $new_obj;
        }

        return $days;

    }

    public static function continuum($days, $count, $present_week)
    {
        $new_arr = [];

        for ($i=0; $i < $count; $i++) {
            if(count($new_arr) < 9){
                for ($j=0; $j < count($days); $j++) {
                    $new_arr[] = $days[$j];
                }
            }
        }
        $new_arr = array_slice($new_arr, 0, intval($count - count($present_week)));

        $new_arr = array_merge($present_week, $new_arr);

        return $new_arr;
    }

    public static function isAvailable($slot_id, $date)
    {
        $status = (bool)  \DB::select("Select * from slots where id = $slot_id AND slot_available
                            > (SELECT count(os.slot_id) from slots s
                             left join order_slots os ON s.id = os.slot_id
                             where os.delivery_date=:date AND os.slot_id =:slot_id)",
                             ["date" => date('Y-m-d', strtotime($date)), 'slot_id' => $slot_id,]);

                            //  dd($status);
        return $status;

    }


}
