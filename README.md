# 'Emogrifier' for ExpressionEngine
This plug-in is designed to help you inline CSS with HTML. Example uses would be  to inline CSS for page speed purposes or in order to create more robust HTML email templates for use with third party ExpressionEngine modules.

BASIC USAGE:

    {exp:emogrifier css="/assets/css/email.css"}<h1>My HTML</h1>{/exp:emogrifier}
    
with perhaps a CSS file as follows:
    
    h1 { color: red; }
    
which would output:
    
    <h1 style="color: red;">My HTML</h1>

PARAMETERS:

css = '/assets/css/email.css' (optional)
 - The css file that you want to emogrify with your HTML

RELEASE NOTES:

1.0 - Initial Release.

For updates and support check the developers website: https://github.com/ihasco/emogrifier.pi.ee_addon

# Thanks

This add-on was inspired by and uses the '[Emogrifer](https://github.com/jjriv/emogrifier)' PHP library written by [John Reeve](https://github.com/jjriv).
