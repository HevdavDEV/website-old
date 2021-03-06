<h1>Разработчикам</h1>
      
      <h3>Исходный код</h3>
      
      <p>
  Мы используем <a href="http://git-scm.com/">git</a> в качестве системы управления 
  нашим исходным кодом, размещенном на <a href="https://github.com/">github</a>. У 
  нас много разных репозиториев для вебсайта, самого ПО Фринет (fred), официальных 
  плагинов, двух установщиков, библиотек и так далее; полный лист на <a href="https://github.com/freenet/">нашей 
  странице на github</a>.
      </p>

      <p>
  Мы настоятельно рекомендуем вам использовать официальный клиент git, работающий в 
  командной строке, или порт для Windows. Если вы хотите использовать Eclipse, 
  смотрите инструкции <a href="http://wiki.eclipse.org/EGit/User_Guide">здесь</a>.
      </p>
      
      <p>Вы можете получить последнюю версию исходного кода из репозитория, выполнив следующую команду:</p>
      <pre>
  git clone git://github.com/freenet/fred.git</pre>

      <p>Однажды клонировав репозиторий, в дальнейшем для получения новых изменений вам следует выполнить:</p>
      <pre>
  git pull origin</pre>

      <p>
    Больше информации об использовании клиента git ниже на этой странице.
      </p>

      <p>
  Git – распределенная система контроля версий, и среди прочего 
  это означает:
      </p>
      <ul>
  <li>Каждый имеет полную копию репозитория, включая всю историю.</li>
  <li>Легкое ветвление и слияние.</li>
  <li>Работа оффлайн (например, в поезде).</li>
  <li>Мы гораздо менее уязвимы к компрометации или ошибкам центрального сервера.</li>
  <li>Большая анонимность при участии в проекте Фринет.</li>
  <li>В целом большая безопасность для документооборота.</li>
      </ul>
      
    <p>Изначально мы использовали git аналогично SVN: Каждый разработчик имеет право внести 
    свои изменения в хранилище, и мы раздавали это право довольно либерально. Однако, это, 
    вероятно, не лучшая модель: Многие другие проекты используя git выбирают более 
    централизованную (или децентрализованную, в зависимости от ваших взглядов) модель, где 
    вы создаете свое ответвление в репозитории (это реально легко на github), вносите ваши 
    изменения, отправляете их в репозиторий, а затем отправляете запрос на внесение ваших 
    изменений в основной репозиторий. Преимущество в том, что случается меньше возвратов в 
    истории, код в целом лучше; отдельные элементы разработки проще отложить, когда мы 
    пытаемся выпустить новую версию; и проще модель безопасности. Мы пытаемся перейти к 
    такой модели в настоящий момент. Возможно, вам будет удобнее работать предложенным 
    образом (github позволяет делает это легко), а не просить разрешение на внесение 
    изменений в исходный код.</p>
    
    <!-- TODO: Remove references to -staging and -official as done on en version. -->
    <p>Каждая часть Фринет сейчас имеет два репозитория: официальный и подготовительный 
    (например, fred-official и fred-staging). Это пережиток нашего периода взаимодействия с 
    git аналогичным с SVN образом: официальный репозиторий оценивался и выпускался минимум 
    как пре-билд и только основные разработчики могли вносить в него изменения – они должны 
    были просматривать код, прежде чем принять его, и обычно подписывали изменения в коде 
    тэгами «билд» или «пре-билд» после проверки. В подготовительный репозиторий вносить 
    изменения мог кто угодно. Новые разработчики должны создать свою ветку на github для 
    внесения изменений в код, а затем отправлять запросы на принятие изменений.</p>
    
    <h3>Ветви</h3>
    <p>Ветвь «master» отслеживает последнюю версию. Ветвь «next» включает в себя код будущего 
    релиза, но будет он принят или нет зависит от руководителя релизов. Любая существенная 
    особенность должна иметь свою собственную ветвь. Ветви релизов, например, «stable-1411», 
    используются руководителем релизов время от времени.</p>
    
      <h3>Инструкции по сборке</h3>
      
      <p>Для сборки исходного кода вам потребуется <a href="http://ant.apache.org/">Apache ANT</a>.</p>
      
      <h3>Полная сборка</h3>
      
      <p>
  Сборка Фреда (Fred – Freenet reference daemon) c помощью ANT загрузит freenet-ext.jar для 
  поддержки сторонних зависимостей с веб-сайта. Чтобы собрать freenet-ext.jar самостоятельно, 
  вам потребуется загрузить модуль contrib, собрать его, а затем положить его в lib/freenet-ext.jar 
  перед сборкой основного проекта. Также стоит отметить, что модуль contrib содержит ряд 
  собственных библиотек, используемых для повышения производительности; возможно, вы также 
  захотите пересобрать их тоже.
      </p>
      <p>
  Плагины, установщики могут быть собраны с помощью ANT, но некоторые библиотеки могут быть 
  написаны на других языках и иметь свои собственные процедуры сборки.
      </p>

      <h3>Основы взаимодействия с git</h3>
      <p>Для отправки всех изменений в репозиторий:</p>
      
      <pre>
  git pull origin</pre>

      <p>
  Или если вы хотите просмотреть изменения в своем локальном репозитории перед 
  объединением:
      </p>

      <pre>
  git fetch origin
  git log -p -M --ignore-space-change master..origin/master</pre>

      <p>
  Если вас устраивают внесенные вами изменения, тогда превратите ваши локальные 
  изменения в удаленные изменения:
      </p>

      <pre>
  git rebase origin/master</pre>
      <p>Или объедините удаленные изменения с локальным репозиторием:</p>
      <pre>
  git merge origin/master</pre>
      <p>Последнее приведет к нелинейной истории изменений, поэтому вы должны 
      использовать rebase, пока ваши локальные изменения не очень большие.</p>
      <p>Для фиксации ваших изменений в вашем локальном репозитории:</p>

      <pre>
  git commit -a</pre>
      <p>Или:</p>
      <pre>
  git commit [ filenames you want to commit ]</pre>
      <p>Для загрузки ваших изменений (в случае, если вы клонировали –staging дерево):</p>
      <pre>
  git push origin</pre>
      <p>Для просмотра последних изменений:</p>
      <pre>
  git log -p -M --ignore-space-change</pre>
      <p>Для отмены одного или нескольких локальных изменений, в случае если вы 
      не загружали свои изменения и не выполняли объединение с удаленными 
      изменениями (просто сбросьте ваш локальный репозиторий к предыдущей версии, 
      пока не избавитесь от лишних изменений):</p>
      <pre>
  git reset [ last good revision ]</pre>

      <p>Или если вы уже приняли ваши изменение, но нуждаетесь в его отмене:</p>
      <pre>
  git revert [ revision to get rid of ]</pre>
      <p>
  Более подробную документацию по использованию git вы сможете найти <a href="http://git-scm.com/documentation">здесь</a>
  и <a href="http://www.kernel.org/pub/software/scm/git/docs/">здесь</a>.
      </p>
      
    <h3>Обзор</h3>
      <p>
  Если вам не нравится принятие изменения, или вы думаете, что оно может быть 
  улучшено, обычно вам стоит писать в <a href="lists.html">почтовый лист для 
  разработчиков</a>. Также вам стоит отправить копию автору изменения, но вы 
  должны всегда писать в почтовый лист разработчиков.
      </p>
    
    <h3>Направления развития</h3>
    <p>
    Пожалуйста, информируйте нас о том, что вы делаете с Фринет. Создайте аккаунт 
    на github, а затем свяжитесь с нами с помощью <a href="https://emu.freenetproject.org/cgi-bin/mailman/listinfo/devl">почтового 
    листа разработчиков</a> или в <a href="https://en.wikipedia.org/wiki/Internet_Relay_Chat">IRC</a> 
    на канале <a href="irc://irc.freenode.net/%23freenet">#freenet</a> сервера 
    irc.freenode.net. Обращаем внимание, что будет очень полезно иметь возможность 
    для связи с участниками, поэтому вам стоит указать реальный (работающий) адрес 
    электронной почты (мы предоставим вам адрес @freenetproject.org с 
    перенаправлением на ваш адрес, если он вам потребуется), или смотрите раздел 
    по участию в разработке непосредственно через Фринет ниже.</p>
  
    <p>Мы настоятельно рекомендуем не «сбрасывать бомбы», отправляя большие объемы 
    изменений без истории. Это сложнее для понимания и юридически рискованно 
    (вспомните тяжбу SCO против IBM). Для крупных проектов вы должны создавать 
    отдельные ветви в github или Фринет, чтобы мы могли применять ваши изменения и 
    хранить историю. Конечно, вы можете очистить историю перед отправкой запроса 
    на слияние, если хотите. Более важно пораньше дать нам знать об этом, чтобы мы 
    помогли вам получить такое право.</p>

    <p>Все релизы просматриваются вручную, чтобы обеспечить безопасность и избежать 
    ошибок, и эта работа будет намного легче, если вы будете следовать нескольким 
    простым правилам:</p>
    <ul>
    <li>Храните косметические изменения отдельно от функциональных. В частности, 
    улучшения отступов и скобок в целом принимаются, но они <b>не должны</b> 
    смешиваться с функциональными изменениями.</li>
    <li>Не ломайте сборку: когда вы отправляете свои изменения, Фред должен 
    собираться. В идеальном варианте после каждого слияния сборка должна быть 
    рабочей.</li>
    <li>Небольшие изменения: «git commit» - полностью локальная операция, поэтому 
    нет никаких причин объединять кучу несвязанных между собой изменений в одно 
    изменение версии. Это же очевидно, судите сами.</li>
    <li>Большие или спорные изменения должны идти в отдельной ветке, а не просто 
    загружаться в основной проект. Мы можем находиться в процессе выпуска новой 
    сборки, и если в это время будет загружено большое изменение, то оно, вероятно, 
    будет вынесено в отдельную ветку до выпуска билда.</li>
    </ul>
    
        <h3>Разработка через Фринет</h3>
    <p>Мы принимаем патчи, загруженные через Фринет используя FMS. Однако, мы все 
    еще нуждаемся в своего рода идентичности, например имя пользовательского 
    аккаунта и адрес Freemail (V2). Есть реализации git и mercurial (возможно 
    совмещение с git) через Фринет. Хотя в настоящее время мы не поддерживаем их 
    в официальном дереве Фринет.</p>
    
        <h3>Веб-сайт</h3>
    <p>Для редактирования веб-сайта, откройте наш подготовительный репозиторий 
    сайта (website-staging), редактируйте файлы (директория pages/en/), а затем 
    выполните принятие изменений и отправьте на слияние. Затем напомните Toad 
    выполнить слияние, если он не выполнил его в разумные сроки. Другой вариант, 
    сделайте ветку модуля вебсайта на github и затем отправляйте запросы на 
    принятие изменений. Это позволяет получить результаты скорее!</p>

    <p>Веб-сайт основан на PHP, но во время исполнения представляется статичным 
    HTML. Вы можете смоделировать это, чтобы посмотреть как именно будут выглядеть 
    ваши изменения, запустив скрипт make-pages.sh (для этого вам потребуется 
    php5-cgi). На выходе скрипт выведет статичный HTML.</p>

    <p>Мы стараемся переместить большую часть документации в <a href="https://wiki.freenetproject.org">wiki</a>, 
    что позволяет легче ее редактировать.</p>
