<?php
/**
 * SEOmatic plugin for Craft CMS 3.x
 *
 * A turnkey SEO implementation for Craft CMS that is comprehensive, powerful,
 * and flexible
 *
 * @link      https://nystudio107.com
 * @copyright Copyright (c) 2017 nystudio107
 */

namespace nystudio107\seomatic\models\jsonld;

use nystudio107\seomatic\models\jsonld\Intangible;

/**
 * Schedule - A schedule defines a repeating time period used to describe a
 * regularly occurring Event. At a minimum a schedule will specify
 * repeatFrequency which describes the interval between occurences of the
 * event. Additional information can be provided to specify the schedule more
 * precisely. This includes identifying the day(s) of the week or month when
 * the recurring event will take place, in addition to its start and end time.
 * Schedules may also have start and end dates to indicate when they are
 * active, e.g. to define a limited calendar of events.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.0.0
 * @see       http://schema.org/Schedule
 */
class Schedule extends Intangible
{
    // Static Public Properties
    // =========================================================================

    /**
     * The Schema.org Type Name
     *
     * @var string
     */
    static public $schemaTypeName = 'Schedule';

    /**
     * The Schema.org Type Scope
     *
     * @var string
     */
    static public $schemaTypeScope = 'https://schema.org/Schedule';

    /**
     * The Schema.org Type Description
     *
     * @var string
     */
    static public $schemaTypeDescription = 'A schedule defines a repeating time period used to describe a regularly occurring Event. At a minimum a schedule will specify repeatFrequency which describes the interval between occurences of the event. Additional information can be provided to specify the schedule more precisely. This includes identifying the day(s) of the week or month when the recurring event will take place, in addition to its start and end time. Schedules may also have start and end dates to indicate when they are active, e.g. to define a limited calendar of events.';

    /**
     * The Schema.org Type Extends
     *
     * @var string
     */
    static public $schemaTypeExtends = 'Intangible';

    /**
     * The Schema.org composed Property Names
     *
     * @var array
     */
    static public $schemaPropertyNames = [];

    /**
     * The Schema.org composed Property Expected Types
     *
     * @var array
     */
    static public $schemaPropertyExpectedTypes = [];

    /**
     * The Schema.org composed Property Descriptions
     *
     * @var array
     */
    static public $schemaPropertyDescriptions = [];

    /**
     * The Schema.org composed Google Required Schema for this type
     *
     * @var array
     */
    static public $googleRequiredSchema = [];

    /**
     * The Schema.org composed Google Recommended Schema for this type
     *
     * @var array
     */
    static public $googleRecommendedSchema = [];

    // Public Properties
    // =========================================================================
    /**
     * The Schema.org Property Names
     *
     * @var array
     */
    static protected $_schemaPropertyNames = [
        'byDay',
        'byMonth',
        'byMonthDay',
        'duration',
        'endDate',
        'exceptDate',
        'repeatCount',
        'repeatFrequency',
        'scheduleTimezone',
        'startDate'
    ];
    /**
     * The Schema.org Property Expected Types
     *
     * @var array
     */
    static protected $_schemaPropertyExpectedTypes = [
        'byDay' => ['DayOfWeek', 'Text'],
        'byMonth' => ['Integer'],
        'byMonthDay' => ['Integer'],
        'duration' => ['Duration'],
        'endDate' => ['Date', 'DateTime'],
        'exceptDate' => ['Date', 'DateTime'],
        'repeatCount' => ['Integer'],
        'repeatFrequency' => ['Duration', 'Text'],
        'scheduleTimezone' => ['Text'],
        'startDate' => ['Date', 'DateTime']
    ];
    /**
     * The Schema.org Property Descriptions
     *
     * @var array
     */
    static protected $_schemaPropertyDescriptions = [
        'byDay' => 'Defines the day(s) of the week on which a recurring Event takes place. May be specified using either DayOfWeek, or alternatively Text conforming to iCal\'s syntax for byDay recurrence rules',
        'byMonth' => 'Defines the month(s) of the year on which a recurring Event takes place. Specified as an Integer between 1-12. January is 1.',
        'byMonthDay' => 'Defines the day(s) of the month on which a recurring Event takes place. Specified as an Integer between 1-31.',
        'duration' => 'The duration of the item (movie, audio recording, event, etc.) in ISO 8601 date format.',
        'endDate' => 'The end date and time of the item (in ISO 8601 date format).',
        'exceptDate' => 'Defines a Date or DateTime during which a scheduled Event will not take place. The property allows exceptions to a Schedule to be specified. If an exception is specified as a DateTime then only the event that would have started at that specific date and time should be excluded from the schedule. If an exception is specified as a Date then any event that is scheduled for that 24 hour period should be excluded from the schedule. This allows a whole day to be excluded from the schedule without having to itemise every scheduled event.',
        'repeatCount' => 'Defines the number of times a recurring Event will take place',
        'repeatFrequency' => 'Defines the frequency at which Events will occur according to a schedule Schedule. The intervals between events should be defined as a Duration of time.',
        'scheduleTimezone' => 'Indicates the timezone for which the time(s) indicated in the Schedule are given. The value provided should be among those listed in the IANA Time Zone Database.',
        'startDate' => 'The start date and time of the item (in ISO 8601 date format).'
    ];
    /**
     * The Schema.org Google Required Schema for this type
     *
     * @var array
     */
    static protected $_googleRequiredSchema = [
    ];
    /**
     * The Schema.org composed Google Recommended Schema for this type
     *
     * @var array
     */
    static protected $_googleRecommendedSchema = [
    ];
    /**
     * Defines the day(s) of the week on which a recurring Event takes place. May
     * be specified using either DayOfWeek, or alternatively Text conforming to
     * iCal's syntax for byDay recurrence rules
     *
     * @var mixed|DayOfWeek|string [schema.org types: DayOfWeek, Text]
     */
    public $byDay;
    /**
     * Defines the month(s) of the year on which a recurring Event takes place.
     * Specified as an Integer between 1-12. January is 1.
     *
     * @var int [schema.org types: Integer]
     */
    public $byMonth;
    /**
     * Defines the day(s) of the month on which a recurring Event takes place.
     * Specified as an Integer between 1-31.
     *
     * @var int [schema.org types: Integer]
     */
    public $byMonthDay;
    /**
     * The duration of the item (movie, audio recording, event, etc.) in ISO 8601
     * date format.
     *
     * @var Duration [schema.org types: Duration]
     */
    public $duration;
    /**
     * The end date and time of the item (in ISO 8601 date format).
     *
     * @var mixed|Date|DateTime [schema.org types: Date, DateTime]
     */
    public $endDate;

    // Static Protected Properties
    // =========================================================================
    /**
     * Defines a Date or DateTime during which a scheduled Event will not take
     * place. The property allows exceptions to a Schedule to be specified. If an
     * exception is specified as a DateTime then only the event that would have
     * started at that specific date and time should be excluded from the
     * schedule. If an exception is specified as a Date then any event that is
     * scheduled for that 24 hour period should be excluded from the schedule.
     * This allows a whole day to be excluded from the schedule without having to
     * itemise every scheduled event.
     *
     * @var mixed|Date|DateTime [schema.org types: Date, DateTime]
     */
    public $exceptDate;
    /**
     * Defines the number of times a recurring Event will take place
     *
     * @var int [schema.org types: Integer]
     */
    public $repeatCount;
    /**
     * Defines the frequency at which Events will occur according to a schedule
     * Schedule. The intervals between events should be defined as a Duration of
     * time.
     *
     * @var mixed|Duration|string [schema.org types: Duration, Text]
     */
    public $repeatFrequency;
    /**
     * Indicates the timezone for which the time(s) indicated in the Schedule are
     * given. The value provided should be among those listed in the IANA Time
     * Zone Database.
     *
     * @var string [schema.org types: Text]
     */
    public $scheduleTimezone;
    /**
     * The start date and time of the item (in ISO 8601 date format).
     *
     * @var mixed|Date|DateTime [schema.org types: Date, DateTime]
     */
    public $startDate;

    // Public Methods
    // =========================================================================

    /**
     * @inheritdoc
     */
    public function init(): void
    {
        parent::init();
        self::$schemaPropertyNames = array_merge(
            parent::$schemaPropertyNames,
            self::$_schemaPropertyNames
        );

        self::$schemaPropertyExpectedTypes = array_merge(
            parent::$schemaPropertyExpectedTypes,
            self::$_schemaPropertyExpectedTypes
        );

        self::$schemaPropertyDescriptions = array_merge(
            parent::$schemaPropertyDescriptions,
            self::$_schemaPropertyDescriptions
        );

        self::$googleRequiredSchema = array_merge(
            parent::$googleRequiredSchema,
            self::$_googleRequiredSchema
        );

        self::$googleRecommendedSchema = array_merge(
            parent::$googleRecommendedSchema,
            self::$_googleRecommendedSchema
        );
    }

    /**
     * @inheritdoc
     */
    public function rules(): array
    {
        $rules = parent::rules();
        $rules = array_merge($rules, [
            [['byDay', 'byMonth', 'byMonthDay', 'duration', 'endDate', 'exceptDate', 'repeatCount', 'repeatFrequency', 'scheduleTimezone', 'startDate'], 'validateJsonSchema'],
            [self::$_googleRequiredSchema, 'required', 'on' => ['google'], 'message' => 'This property is required by Google.'],
            [self::$_googleRecommendedSchema, 'required', 'on' => ['google'], 'message' => 'This property is recommended by Google.']
        ]);

        return $rules;
    }
}
