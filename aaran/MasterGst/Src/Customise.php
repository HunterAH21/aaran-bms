<?php

namespace Aaran\MasterGst\Src;

class Customise
{
    public static function enabled(string $feature): bool
    {
//        return match (config('master-gst.app_code')) {
//
//            config('software.DEVELOPER') => in_array($feature, config('developer.customise', [])),
//            config('software.OFFSET') => in_array($feature, config('offset.customise', [])),
//
//        };
        $appCode = config('master-gst.app_code');

        if (!$appCode) {
            return false;
        }

        return match ($appCode) {
            config('software.DEVELOPER') => in_array($feature, config('developer.customise', [])),
            config('software.OFFSET') => in_array($feature, config('offset.customise', [])),
            default => false,
        };


    }

    #region[Common]
    public static function hasCommon(): bool
    {
        return static::enabled(static::common());
    }

    public static function common(): string
    {
        return 'common';
    }

    #endregion

    #region[Master]
    public static function hasMAster(): bool
    {
        return static::enabled(static::master());
    }

    public static function master(): string
    {
        return 'master';
    }

    #endregion

    #region[Entries]
    public static function hasEntries(): bool
    {
        return static::enabled(static::entries());
    }

    public static function entries(): string
    {
        return 'entries';
    }

    #endregion

    #region[Blog]
    public static function hasBlog(): bool
    {
        return static::enabled(static::blog());
    }

    public static function blog(): string
    {
        return 'blog';
    }

    #endregion

    #region[Task Manger]
    public static function hasTaskManager(): bool
    {
        return static::enabled(static::taskManager());
    }

    public static function taskManager(): string
    {
        return 'taskManager';
    }

    #endregion

    #region[Core]
    public static function hasCore(): bool
    {
        return static::enabled(static::core());
    }

    public static function core(): string
    {
        return 'core';
    }
    #endregion

    #region[GST-API]
    public static function hasGstApi(): bool
    {
        return static::enabled(static::gstapi());
    }

    public static function gstapi(): string
    {
        return 'gstapi';
    }
    #endregion

    #region[Transaction]
    public static function hasTransaction(): bool
    {
        return static::enabled(static::transaction());
    }

    public static function transaction(): string
    {
        return 'transaction';
    }
    #endregion

    #region[Demo data]
    public static function hasDemoData(): bool
    {
        return static::enabled(static::demoData());
    }

    public static function demoData(): string
    {
        return 'demoData';
    }
    #endregion


    #region[ExportSales]
    public static function hasExportSales(): bool
    {
        return static::enabled(static::exportSales());
    }

    public static function exportSales(): string
    {
        return 'exportSales';
    }
    #endregion


    #region[Demo data]
    public static function hasReport(): bool
    {
        return static::enabled(static::report());
    }

    public static function report(): string
    {
        return 'report';
    }
    #endregion

    #region[LogBook]
    public static function hasLogbook(): bool
    {
        return static::enabled(static::logbooks());
    }

    public static function logbooks(): string
    {
        return 'logbooks';
    }
    #endregion

    #region[Accounts]
    public static function hasAccounts(): bool
    {
        return static::enabled(static::accounts());
    }

    public static function accounts(): string
    {
        return 'accounts';
    }
    #endregion

}
