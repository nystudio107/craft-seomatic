<?php

/**
 * SEOmatic plugin for Craft CMS
 *
 * A turnkey SEO implementation for Craft CMS that is comprehensive, powerful, and flexible
 *
 * @link      https://nystudio107.com
 * @copyright Copyright (c) nystudio107
 */

namespace nystudio107\seomatic\models\jsonld;

/**
 * schema.org version: v26.0-release
 * Trait for Schedule.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/Schedule
 */
trait ScheduleTrait
{
    /**
     * The end date and time of the item (in [ISO 8601 date
     * format](http://en.wikipedia.org/wiki/ISO_8601)).
     *
     * @var array|Date|Date[]|array|DateTime|DateTime[]
     */
    public $endDate;

    /**
     * The duration of the item (movie, audio recording, event, etc.) in [ISO 8601
     * date format](http://en.wikipedia.org/wiki/ISO_8601).
     *
     * @var array|Duration|Duration[]
     */
    public $duration;

    /**
     * Defines the week(s) of the month on which a recurring Event takes place.
     * Specified as an Integer between 1-5. For clarity, byMonthWeek is best used
     * in conjunction with byDay to indicate concepts like the first and third
     * Mondays of a month.
     *
     * @var int|array|Integer|Integer[]
     */
    public $byMonthWeek;

    /**
     * Defines the frequency at which [[Event]]s will occur according to a
     * schedule [[Schedule]]. The intervals between       events should be defined
     * as a [[Duration]] of time.
     *
     * @var string|array|Duration|Duration[]|array|Text|Text[]
     */
    public $repeatFrequency;

    /**
     * Defines the month(s) of the year on which a recurring [[Event]] takes
     * place. Specified as an [[Integer]] between 1-12. January is 1.
     *
     * @var int|array|Integer|Integer[]
     */
    public $byMonth;

    /**
     * Defines the day(s) of the month on which a recurring [[Event]] takes place.
     * Specified as an [[Integer]] between 1-31.
     *
     * @var int|array|Integer|Integer[]
     */
    public $byMonthDay;

    /**
     * The startTime of something. For a reserved event or service (e.g.
     * FoodEstablishmentReservation), the time that it is expected to start. For
     * actions that span a period of time, when the action was performed. E.g.
     * John wrote a book from *January* to December. For media, including audio
     * and video, it's the time offset of the start of a clip within a larger
     * file.  Note that Event uses startDate/endDate instead of startTime/endTime,
     * even when describing dates with times. This situation may be clarified in
     * future revisions.
     *
     * @var array|Time|Time[]|array|DateTime|DateTime[]
     */
    public $startTime;

    /**
     * Defines a [[Date]] or [[DateTime]] during which a scheduled [[Event]] will
     * not take place. The property allows exceptions to       a [[Schedule]] to
     * be specified. If an exception is specified as a [[DateTime]] then only the
     * event that would have started at that specific date and time       should
     * be excluded from the schedule. If an exception is specified as a [[Date]]
     * then any event that is scheduled for that 24 hour period should be
     * excluded from the schedule. This allows a whole day to be excluded from the
     * schedule without having to itemise every scheduled event.
     *
     * @var array|Date|Date[]|array|DateTime|DateTime[]
     */
    public $exceptDate;

    /**
     * Defines the number of times a recurring [[Event]] will take place.
     *
     * @var int|array|Integer|Integer[]
     */
    public $repeatCount;

    /**
     * The endTime of something. For a reserved event or service (e.g.
     * FoodEstablishmentReservation), the time that it is expected to end. For
     * actions that span a period of time, when the action was performed. E.g.
     * John wrote a book from January to *December*. For media, including audio
     * and video, it's the time offset of the end of a clip within a larger file.
     * Note that Event uses startDate/endDate instead of startTime/endTime, even
     * when describing dates with times. This situation may be clarified in future
     * revisions.
     *
     * @var array|Time|Time[]|array|DateTime|DateTime[]
     */
    public $endTime;

    /**
     * Indicates the timezone for which the time(s) indicated in the [[Schedule]]
     * are given. The value provided should be among those listed in the IANA Time
     * Zone Database.
     *
     * @var string|array|Text|Text[]
     */
    public $scheduleTimezone;

    /**
     * The start date and time of the item (in [ISO 8601 date
     * format](http://en.wikipedia.org/wiki/ISO_8601)).
     *
     * @var array|Date|Date[]|array|DateTime|DateTime[]
     */
    public $startDate;

    /**
     * Defines the day(s) of the week on which a recurring [[Event]] takes place.
     * May be specified using either [[DayOfWeek]], or alternatively [[Text]]
     * conforming to iCal's syntax for byDay recurrence rules.
     *
     * @var string|array|Text|Text[]|array|DayOfWeek|DayOfWeek[]
     */
    public $byDay;
}
