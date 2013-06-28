App.Helpers.RelativeTime = function(date)
{
	var seconds = Math.floor( (new Date().getTime() - Date.parse(date)) / 1000);

    var interval = Math.floor(seconds / 31536000);

    if (interval > 1) {
        return interval + "y";
    }
    interval = Math.floor(seconds / 604800);
    if (interval > 1) {
        return interval + "w";
    }
    interval = Math.floor(seconds / 86400);
    if (interval > 1) {
        return interval + "d";
    }
    interval = Math.floor(seconds / 3600);
    if (interval > 1) {
        return interval + "h";
    }
    interval = Math.floor(seconds / 60);
    if (interval > 1) {
        return interval + "m";
    }
    return Math.floor(seconds) + "s";
}