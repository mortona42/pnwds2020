var config = {"cacheBust":true,"cleanPublic":true,"defaultPattern":"all","defaultShowPatternInfo":false,"ishControlsHide":{"s":false,"m":false,"l":false,"full":false,"random":false,"disco":false,"hay":true,"mqs":false,"find":false,"views-all":false,"views-annotations":false,"views-code":false,"views-new":false,"tools-all":false,"tools-docs":false},"ishViewportRange":{"s":[240,500],"m":[500,800],"l":[800,2600]},"logLevel":"info","outputFileSuffixes":{"rendered":".rendered","rawTemplate":"","markupOnly":".markup-only"},"paths":{"source":{"root":"./source/","patterns":"./source/_patterns/","data":"./source/_data/","meta":"./source/_meta/","annotations":"./source/_annotations/","styleguide":"dist/","patternlabFiles":{"general-header":"views/partials/general-header.mustache","general-footer":"views/partials/general-footer.mustache","patternSection":"views/partials/patternSection.mustache","patternSectionSubtype":"views/partials/patternSectionSubtype.mustache","viewall":"views/viewall.mustache"},"js":"./source/js","images":"./source/images","fonts":"./source/fonts","css":"./source/css"},"public":{"root":"public/","patterns":"public/patterns/","data":"public/styleguide/data/","annotations":"public/annotations/","styleguide":"public/styleguide/","js":"public/js","images":"public/images","fonts":"public/fonts","css":"public/css"}},"patternExtension":"twig","patternStateCascade":["inprogress","inreview","complete"],"patternExportAll":false,"patternExportDirectory":"pattern_exports","patternExportPatternPartials":[],"patternExportPreserveDirectoryStructure":true,"patternExportRaw":false,"serverOptions":{"wait":1000},"starterkitSubDir":"dist","styleGuideExcludes":[],"theme":{"color":"light","density":"compact","layout":"horizontal","noViewAll":false},"uikits":[{"name":"uikit-workshop","outputDir":"","enabled":true,"excludedPatternStates":[],"excludedTags":[]}],"engines":{"twig":{"namespaces":[{"id":"atoms","recursive":true,"paths":["source/_patterns/00-atoms"]},{"id":"molecules","recursive":true,"paths":["source/_patterns/01-molecules"]},{"id":"components","recursive":true,"paths":["source/_patterns/02-components"]},{"id":"ideas","recursive":true,"paths":["source/_patterns/04-ideas"]},{"id":"macros","recursive":true,"paths":["source/_macros"]}],"alterTwigEnv":[{"file":"alter-twig.php","functions":["addCustomExtension"]}]}}};
var ishControls = {"ishControlsHide":{"s":false,"m":false,"l":false,"full":false,"random":false,"disco":false,"hay":true,"mqs":false,"find":false,"views-all":false,"views-annotations":false,"views-code":false,"views-new":false,"tools-all":false,"tools-docs":false}};
var navItems = {"patternTypes": [{"patternTypeLC":"atoms","patternTypeUC":"Atoms","patternType":"00-atoms","patternTypeDash":"atoms","patternTypeItems":[{"patternSubtypeLC":"global","patternSubtypeUC":"Global","patternSubtype":"01-global","patternSubtypeDash":"global","patternSubtypeItems":[{"patternPartial":"viewall-atoms-global","patternName":"View All","patternPath":"00-atoms-01-global/index.html","patternType":"00-atoms","order":0},{"patternPartial":"atoms-colors","patternName":"Colors","patternState":"","patternSrcPath":"00-atoms/01-global/00-colors","patternPath":"00-atoms-01-global/00-atoms-01-global.html","order":9007199254740991},{"patternPartial":"atoms-animations","patternName":"Animations","patternState":"","patternSrcPath":"00-atoms/01-global/02-animations","patternPath":"00-atoms-01-global/00-atoms-01-global.html","order":9007199254740991},{"patternPartial":"atoms-visibility","patternName":"Visibility","patternState":"","patternSrcPath":"00-atoms/01-global/03-visibility","patternPath":"00-atoms-01-global/00-atoms-01-global.html","order":9007199254740991}]},{"patternSubtypeLC":"text","patternSubtypeUC":"Text","patternSubtype":"02-text","patternSubtypeDash":"text","patternSubtypeItems":[{"patternPartial":"viewall-atoms-text","patternName":"View All","patternPath":"00-atoms-02-text/index.html","patternType":"00-atoms","order":0},{"patternPartial":"atoms-headings","patternName":"Headings","patternState":"","patternSrcPath":"00-atoms/02-text/00-headings","patternPath":"00-atoms-02-text/00-atoms-02-text.html","order":9007199254740991},{"patternPartial":"atoms-paragraph","patternName":"Paragraph","patternState":"","patternSrcPath":"00-atoms/02-text/01-paragraph","patternPath":"00-atoms-02-text/00-atoms-02-text.html","order":9007199254740991},{"patternPartial":"atoms-blockquote","patternName":"Blockquote","patternState":"","patternSrcPath":"00-atoms/02-text/02-blockquote","patternPath":"00-atoms-02-text/00-atoms-02-text.html","order":9007199254740991},{"patternPartial":"atoms-inline-elements","patternName":"Inline Elements","patternState":"","patternSrcPath":"00-atoms/02-text/03-inline-elements","patternPath":"00-atoms-02-text/00-atoms-02-text.html","order":9007199254740991},{"patternPartial":"atoms-time","patternName":"Time","patternState":"","patternSrcPath":"00-atoms/02-text/04-time","patternPath":"00-atoms-02-text/00-atoms-02-text.html","order":9007199254740991},{"patternPartial":"atoms-preformatted-text","patternName":"Preformatted Text","patternState":"","patternSrcPath":"00-atoms/02-text/05-preformatted-text","patternPath":"00-atoms-02-text/00-atoms-02-text.html","order":9007199254740991},{"patternPartial":"atoms-hr","patternName":"Hr","patternState":"","patternSrcPath":"00-atoms/02-text/06-hr","patternPath":"00-atoms-02-text/00-atoms-02-text.html","order":9007199254740991}]},{"patternSubtypeLC":"lists","patternSubtypeUC":"Lists","patternSubtype":"03-lists","patternSubtypeDash":"lists","patternSubtypeItems":[{"patternPartial":"viewall-atoms-lists","patternName":"View All","patternPath":"00-atoms-03-lists/index.html","patternType":"00-atoms","order":0},{"patternPartial":"atoms-unordered","patternName":"Unordered","patternState":"","patternSrcPath":"00-atoms/03-lists/00-unordered","patternPath":"00-atoms-03-lists/00-atoms-03-lists.html","order":9007199254740991},{"patternPartial":"atoms-ordered","patternName":"Ordered","patternState":"","patternSrcPath":"00-atoms/03-lists/01-ordered","patternPath":"00-atoms-03-lists/00-atoms-03-lists.html","order":9007199254740991},{"patternPartial":"atoms-definition","patternName":"Definition","patternState":"","patternSrcPath":"00-atoms/03-lists/02-definition","patternPath":"00-atoms-03-lists/00-atoms-03-lists.html","order":9007199254740991}]},{"patternSubtypeLC":"images","patternSubtypeUC":"Images","patternSubtype":"04-images","patternSubtypeDash":"images","patternSubtypeItems":[{"patternPartial":"viewall-atoms-images","patternName":"View All","patternPath":"00-atoms-04-images/index.html","patternType":"00-atoms","order":0},{"patternPartial":"atoms-logo","patternName":"Logo","patternState":"","patternSrcPath":"00-atoms/04-images/00-logo","patternPath":"00-atoms-04-images/00-atoms-04-images.html","order":9007199254740991},{"patternPartial":"atoms-landscape-4x3","patternName":"Landscape 4x3","patternState":"","patternSrcPath":"00-atoms/04-images/01-landscape-4x3","patternPath":"00-atoms-04-images/00-atoms-04-images.html","order":9007199254740991},{"patternPartial":"atoms-landscape-16x9","patternName":"Landscape 16x9","patternState":"","patternSrcPath":"00-atoms/04-images/02-landscape-16x9","patternPath":"00-atoms-04-images/00-atoms-04-images.html","order":9007199254740991},{"patternPartial":"atoms-square","patternName":"Square","patternState":"","patternSrcPath":"00-atoms/04-images/03-square","patternPath":"00-atoms-04-images/00-atoms-04-images.html","order":9007199254740991},{"patternPartial":"atoms-avatar","patternName":"Avatar","patternState":"","patternSrcPath":"00-atoms/04-images/04-avatar","patternPath":"00-atoms-04-images/00-atoms-04-images.html","order":9007199254740991},{"patternPartial":"atoms-icons","patternName":"Icons","patternState":"","patternSrcPath":"00-atoms/04-images/05-icons","patternPath":"00-atoms-04-images/00-atoms-04-images.html","order":9007199254740991},{"patternPartial":"atoms-loading-icon","patternName":"Loading Icon","patternState":"","patternSrcPath":"00-atoms/04-images/06-loading-icon","patternPath":"00-atoms-04-images/00-atoms-04-images.html","order":9007199254740991},{"patternPartial":"atoms-favicon","patternName":"Favicon","patternState":"","patternSrcPath":"00-atoms/04-images/07-favicon","patternPath":"00-atoms-04-images/00-atoms-04-images.html","order":9007199254740991}]},{"patternSubtypeLC":"forms","patternSubtypeUC":"Forms","patternSubtype":"05-forms","patternSubtypeDash":"forms","patternSubtypeItems":[{"patternPartial":"viewall-atoms-forms","patternName":"View All","patternPath":"00-atoms-05-forms/index.html","patternType":"00-atoms","order":0},{"patternPartial":"atoms-text-fields","patternName":"Text Fields","patternState":"","patternSrcPath":"00-atoms/05-forms/00-text-fields","patternPath":"00-atoms-05-forms/00-atoms-05-forms.html","order":9007199254740991},{"patternPartial":"atoms-select-menu","patternName":"Select Menu","patternState":"","patternSrcPath":"00-atoms/05-forms/01-select-menu","patternPath":"00-atoms-05-forms/00-atoms-05-forms.html","order":9007199254740991},{"patternPartial":"atoms-checkbox","patternName":"Checkbox","patternState":"","patternSrcPath":"00-atoms/05-forms/02-checkbox","patternPath":"00-atoms-05-forms/00-atoms-05-forms.html","order":9007199254740991},{"patternPartial":"atoms-radio-buttons","patternName":"Radio Buttons","patternState":"","patternSrcPath":"00-atoms/05-forms/03-radio-buttons","patternPath":"00-atoms-05-forms/00-atoms-05-forms.html","order":9007199254740991},{"patternPartial":"atoms-html5-inputs","patternName":"Html5 Inputs","patternState":"","patternSrcPath":"00-atoms/05-forms/04-html5-inputs","patternPath":"00-atoms-05-forms/00-atoms-05-forms.html","order":9007199254740991},{"patternPartial":"atoms-fieldset","patternName":"Fieldset","patternState":"","patternSrcPath":"00-atoms/05-forms/05-fieldset","patternPath":"00-atoms-05-forms/00-atoms-05-forms.html","order":9007199254740991}]},{"patternSubtypeLC":"buttons","patternSubtypeUC":"Buttons","patternSubtype":"06-buttons","patternSubtypeDash":"buttons","patternSubtypeItems":[{"patternPartial":"viewall-atoms-buttons","patternName":"View All","patternPath":"00-atoms-06-buttons/index.html","patternType":"00-atoms","order":0},{"patternPartial":"atoms-buttons","patternName":"Buttons","patternState":"","patternSrcPath":"00-atoms/06-buttons/00-buttons","patternPath":"00-atoms-06-buttons/00-atoms-06-buttons.html","order":9007199254740991}]},{"patternSubtypeLC":"tables","patternSubtypeUC":"Tables","patternSubtype":"07-tables","patternSubtypeDash":"tables","patternSubtypeItems":[{"patternPartial":"viewall-atoms-tables","patternName":"View All","patternPath":"00-atoms-07-tables/index.html","patternType":"00-atoms","order":0},{"patternPartial":"atoms-table","patternName":"Table","patternState":"","patternSrcPath":"00-atoms/07-tables/00-table","patternPath":"00-atoms-07-tables/00-atoms-07-tables.html","order":9007199254740991}]}],"patternItems":[{"patternPartial":"viewall-atoms-all","patternName":"View All","patternPath":"00-atoms/index.html","order":-9007199254740991}]},{"patternTypeLC":"molecules","patternTypeUC":"Molecules","patternType":"01-molecules","patternTypeDash":"molecules","patternTypeItems":[{"patternSubtypeLC":"layout","patternSubtypeUC":"Layout","patternSubtype":"01-layout","patternSubtypeDash":"layout","patternSubtypeItems":[{"patternPartial":"viewall-molecules-layout","patternName":"View All","patternPath":"01-molecules-01-layout/index.html","patternType":"01-molecules","order":0},{"patternPartial":"molecules-one-up","patternName":"One Up","patternState":"","patternSrcPath":"01-molecules/01-layout/00-one-up","patternPath":"01-molecules-01-layout/01-molecules-01-layout.html","order":9007199254740991},{"patternPartial":"molecules-two-up","patternName":"Two Up","patternState":"","patternSrcPath":"01-molecules/01-layout/01-two-up","patternPath":"01-molecules-01-layout/01-molecules-01-layout.html","order":9007199254740991},{"patternPartial":"molecules-three-up","patternName":"Three Up","patternState":"","patternSrcPath":"01-molecules/01-layout/02-three-up","patternPath":"01-molecules-01-layout/01-molecules-01-layout.html","order":9007199254740991},{"patternPartial":"molecules-four-up","patternName":"Four Up","patternState":"","patternSrcPath":"01-molecules/01-layout/03-four-up","patternPath":"01-molecules-01-layout/01-molecules-01-layout.html","order":9007199254740991}]},{"patternSubtypeLC":"forms","patternSubtypeUC":"Forms","patternSubtype":"04-forms","patternSubtypeDash":"forms","patternSubtypeItems":[{"patternPartial":"viewall-molecules-forms","patternName":"View All","patternPath":"01-molecules-04-forms/index.html","patternType":"01-molecules","order":0},{"patternPartial":"molecules-user-login-form","patternName":"User Login Form","patternState":"","patternSrcPath":"01-molecules/04-forms/user-login-form","patternPath":"01-molecules-04-forms/01-molecules-04-forms.html","order":9007199254740991}]},{"patternSubtypeLC":"navigation","patternSubtypeUC":"Navigation","patternSubtype":"05-navigation","patternSubtypeDash":"navigation","patternSubtypeItems":[{"patternPartial":"viewall-molecules-navigation","patternName":"View All","patternPath":"01-molecules-05-navigation/index.html","patternType":"01-molecules","order":0},{"patternPartial":"molecules-primary-nav","patternName":"Primary Nav","patternState":"","patternSrcPath":"01-molecules/05-navigation/00-primary-nav","patternPath":"01-molecules-05-navigation/01-molecules-05-navigation.html","order":9007199254740991},{"patternPartial":"molecules-footer-nav","patternName":"Footer Nav","patternState":"","patternSrcPath":"01-molecules/05-navigation/01-footer-nav","patternPath":"01-molecules-05-navigation/01-molecules-05-navigation.html","order":9007199254740991},{"patternPartial":"molecules-tabs","patternName":"Tabs","patternState":"","patternSrcPath":"01-molecules/05-navigation/04-tabs","patternPath":"01-molecules-05-navigation/01-molecules-05-navigation.html","order":9007199254740991}]}],"patternItems":[{"patternPartial":"viewall-molecules-all","patternName":"View All","patternPath":"01-molecules/index.html","order":-9007199254740991}]},{"patternTypeLC":"components","patternTypeUC":"Components","patternType":"02-components","patternTypeDash":"components","patternTypeItems":[{"patternSubtypeLC":"banner","patternSubtypeUC":"Banner","patternSubtype":"banner","patternSubtypeDash":"banner","patternSubtypeItems":[{"patternPartial":"viewall-components-banner","patternName":"View All","patternPath":"02-components-banner/index.html","patternType":"02-components","order":0},{"patternPartial":"components-hero-image","patternName":"Hero Image","patternState":"","patternSrcPath":"02-components/banner/hero-image","patternPath":"02-components-banner/02-components-banner.html","order":9007199254740991},{"patternPartial":"components-hero-text","patternName":"Hero Text","patternState":"","patternSrcPath":"02-components/banner/hero-text","patternPath":"02-components-banner/02-components-banner.html","order":9007199254740991},{"patternPartial":"components-hero-video","patternName":"Hero Video","patternState":"","patternSrcPath":"02-components/banner/hero-video","patternPath":"02-components-banner/02-components-banner.html","order":9007199254740991}]},{"patternSubtypeLC":"cta","patternSubtypeUC":"Cta","patternSubtype":"cta","patternSubtypeDash":"cta","patternSubtypeItems":[{"patternPartial":"viewall-components-cta","patternName":"View All","patternPath":"02-components-cta/index.html","patternType":"02-components","order":0},{"patternPartial":"components-cta","patternName":"Cta","patternState":"","patternSrcPath":"02-components/cta/cta","patternPath":"02-components-cta/02-components-cta.html","order":9007199254740991},{"patternPartial":"components-cta-session","patternName":"Cta Session","patternState":"","patternSrcPath":"02-components/cta/cta~session","patternPath":"02-components-cta/02-components-cta.html","order":9007199254740991},{"patternPartial":"components-cta-ticket","patternName":"Cta Ticket","patternState":"","patternSrcPath":"02-components/cta/cta~ticket","patternPath":"02-components-cta/02-components-cta.html","order":9007199254740991}]},{"patternSubtypeLC":"messaging","patternSubtypeUC":"Messaging","patternSubtype":"messaging","patternSubtypeDash":"messaging","patternSubtypeItems":[{"patternPartial":"viewall-components-messaging","patternName":"View All","patternPath":"02-components-messaging/index.html","patternType":"02-components","order":0},{"patternPartial":"components-alert","patternName":"Alert","patternState":"","patternSrcPath":"02-components/messaging/00-alert","patternPath":"02-components-messaging/02-components-messaging.html","order":9007199254740991}]},{"patternSubtypeLC":"session","patternSubtypeUC":"Session","patternSubtype":"session","patternSubtypeDash":"session","patternSubtypeItems":[{"patternPartial":"viewall-components-session","patternName":"View All","patternPath":"02-components-session/index.html","patternType":"02-components","order":0},{"patternPartial":"components-session-full","patternName":"Session Full","patternState":"","patternSrcPath":"02-components/session/session-full","patternPath":"02-components-session/02-components-session.html","order":9007199254740991},{"patternPartial":"components-sessions","patternName":"Sessions","patternState":"","patternSrcPath":"02-components/session/sessions","patternPath":"02-components-session/02-components-session.html","order":9007199254740991}]},{"patternSubtypeLC":"social","patternSubtypeUC":"Social","patternSubtype":"social","patternSubtypeDash":"social","patternSubtypeItems":[{"patternPartial":"viewall-components-social","patternName":"View All","patternPath":"02-components-social/index.html","patternType":"02-components","order":0},{"patternPartial":"components-social-links","patternName":"Social Links","patternState":"","patternSrcPath":"02-components/social/social-links","patternPath":"02-components-social/02-components-social.html","order":9007199254740991},{"patternPartial":"components-social-share","patternName":"Social Share","patternState":"","patternSrcPath":"02-components/social/social-share","patternPath":"02-components-social/02-components-social.html","order":9007199254740991}]},{"patternSubtypeLC":"speaker","patternSubtypeUC":"Speaker","patternSubtype":"speaker","patternSubtypeDash":"speaker","patternSubtypeItems":[{"patternPartial":"viewall-components-speaker","patternName":"View All","patternPath":"02-components-speaker/index.html","patternType":"02-components","order":0},{"patternPartial":"components-speaker","patternName":"Speaker","patternState":"","patternSrcPath":"02-components/speaker/speaker","patternPath":"02-components-speaker/02-components-speaker.html","order":9007199254740991},{"patternPartial":"components-speakers","patternName":"Speakers","patternState":"","patternSrcPath":"02-components/speaker/speakers","patternPath":"02-components-speaker/02-components-speaker.html","order":9007199254740991}]}],"patternItems":[{"patternPartial":"viewall-components-all","patternName":"View All","patternPath":"02-components/index.html","order":-9007199254740991}]},{"patternTypeLC":"ideas","patternTypeUC":"Ideas","patternType":"04-ideas","patternTypeDash":"ideas","patternTypeItems":[],"patternItems":[{"patternPartial":"ideas-front","patternName":"Front","patternState":"","patternSrcPath":"04-ideas/front","patternPath":"04-ideas-front/04-ideas-front.html","order":9007199254740991},{"patternPartial":"ideas-page","patternName":"Page","patternState":"","patternSrcPath":"04-ideas/page","patternPath":"04-ideas-page/04-ideas-page.html","order":9007199254740991},{"patternPartial":"ideas-page-forms","patternName":"Page Forms","patternState":"","patternSrcPath":"04-ideas/page-forms","patternPath":"04-ideas-page-forms/04-ideas-page-forms.html","order":9007199254740991},{"patternPartial":"ideas-page-session","patternName":"Page Session","patternState":"","patternSrcPath":"04-ideas/page-session","patternPath":"04-ideas-page-session/04-ideas-page-session.html","order":9007199254740991},{"patternPartial":"ideas-page-sessions","patternName":"Page Sessions","patternState":"","patternSrcPath":"04-ideas/page-sessions","patternPath":"04-ideas-page-sessions/04-ideas-page-sessions.html","order":9007199254740991},{"patternPartial":"ideas-page-text-banner","patternName":"Page Text Banner","patternState":"","patternSrcPath":"04-ideas/page-text-banner","patternPath":"04-ideas-page-text-banner/04-ideas-page-text-banner.html","order":9007199254740991}]}], "ishControlsHide": {"s":false,"m":false,"l":false,"full":false,"random":false,"disco":false,"hay":true,"mqs":false,"find":false,"views-all":false,"views-annotations":false,"views-code":false,"views-new":false,"tools-all":false,"tools-docs":false}};
var patternPaths = {"atoms":{"colors":"00-atoms-01-global-00-colors","animations":"00-atoms-01-global-02-animations","visibility":"00-atoms-01-global-03-visibility","headings":"00-atoms-02-text-00-headings","paragraph":"00-atoms-02-text-01-paragraph","blockquote":"00-atoms-02-text-02-blockquote","inline-elements":"00-atoms-02-text-03-inline-elements","time":"00-atoms-02-text-04-time","preformatted-text":"00-atoms-02-text-05-preformatted-text","hr":"00-atoms-02-text-06-hr","unordered":"00-atoms-03-lists-00-unordered","ordered":"00-atoms-03-lists-01-ordered","definition":"00-atoms-03-lists-02-definition","logo":"00-atoms-04-images-00-logo","landscape-4x3":"00-atoms-04-images-01-landscape-4x3","landscape-16x9":"00-atoms-04-images-02-landscape-16x9","square":"00-atoms-04-images-03-square","avatar":"00-atoms-04-images-04-avatar","icons":"00-atoms-04-images-05-icons","loading-icon":"00-atoms-04-images-06-loading-icon","favicon":"00-atoms-04-images-07-favicon","text-fields":"00-atoms-05-forms-00-text-fields","select-menu":"00-atoms-05-forms-01-select-menu","checkbox":"00-atoms-05-forms-02-checkbox","radio-buttons":"00-atoms-05-forms-03-radio-buttons","html5-inputs":"00-atoms-05-forms-04-html5-inputs","fieldset":"00-atoms-05-forms-05-fieldset","buttons":"00-atoms-06-buttons-00-buttons","table":"00-atoms-07-tables-00-table"},"molecules":{"one-up":"01-molecules-01-layout-00-one-up","two-up":"01-molecules-01-layout-01-two-up","three-up":"01-molecules-01-layout-02-three-up","four-up":"01-molecules-01-layout-03-four-up","user-login-form":"01-molecules-04-forms-user-login-form","primary-nav":"01-molecules-05-navigation-00-primary-nav","footer-nav":"01-molecules-05-navigation-01-footer-nav","tabs":"01-molecules-05-navigation-04-tabs"},"components":{"hero-image":"02-components-banner-hero-image","hero-text":"02-components-banner-hero-text","hero-video":"02-components-banner-hero-video","cta":"02-components-cta-cta","cta-session":"02-components-cta-cta-session","cta-ticket":"02-components-cta-cta-ticket","alert":"02-components-messaging-00-alert","session-full":"02-components-session-session-full","sessions":"02-components-session-sessions","social-links":"02-components-social-social-links","social-share":"02-components-social-social-share","speaker":"02-components-speaker-speaker","speakers":"02-components-speaker-speakers"},"ideas":{"front":"04-ideas-front","page":"04-ideas-page","page-forms":"04-ideas-page-forms","page-session":"04-ideas-page-session","page-sessions":"04-ideas-page-sessions","page-text-banner":"04-ideas-page-text-banner"}};
var viewAllPaths = {"atoms":{"global":"00-atoms-01-global","all":"00-atoms","text":"00-atoms-02-text","lists":"00-atoms-03-lists","images":"00-atoms-04-images","forms":"00-atoms-05-forms","buttons":"00-atoms-06-buttons","tables":"00-atoms-07-tables"},"molecules":{"layout":"01-molecules-01-layout","all":"01-molecules","forms":"01-molecules-04-forms","navigation":"01-molecules-05-navigation"},"components":{"banner":"02-components-banner","all":"02-components","cta":"02-components-cta","messaging":"02-components-messaging","session":"02-components-session","social":"02-components-social","speaker":"02-components-speaker"}};
var plugins = [];
var defaultShowPatternInfo = false;
var defaultPattern = "all";
module.exports = { config, ishControls, navItems, patternPaths, viewAllPaths, plugins, defaultShowPatternInfo, defaultPattern };