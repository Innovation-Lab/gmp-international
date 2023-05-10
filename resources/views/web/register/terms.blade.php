@extends('web.layouts.pages._form')
@section('title', '利用規約')
@section('class', 'body_')
@section('content')
<div class="p-terms">
  <div class="p-terms__head">
    <div class="p-terms__ttl">
      <p>新規会員登録</p>
    </div>
  </div>
  <div class="p-terms__body">
    <a href="http://localhost:8082/login">登録済みの方はこちら</a>
    <div class="p-term__ttl">
      <p class="c-ttl">ユーザー登録システム利用規約</p>
    </div>
    <div class="p-term__txt">
      <p class="c-description">
        以下の利用規約をよくお読みの上、「上記の利用規約に同意する。」にチェックを入れて「新規登録ページへ」をクリックしてください。<br>
        株式会社GMPインターナショナル（以下「当社」）が販売するベビーカー・チャイルドシート（以下「製品」）のご登録及びユーザー情報のご登録（以下「ユーザー登録システム」）を
        ご利用いただくにあたり、利用規約の同意を以て本規約の内容をご承諾いただいたものとみなします。本規約の内容は、必要に応じて一部変更、改編することがございますが、その都度
        ユーザーへのご連絡はいたしかねます。ご利用の際には本ページに掲載されております最新の利用規約をご参照ください。
      </p>
    </div>
    <!-- 規約内容 -->
    <ul class="p-terms__box">
      <li class="p-terms__item">
        <div class="p-term__ttl p-term__ttl--sub">
          <p class="c-ttl">ユーザー登録システムのご利用について</p>
        </div>
        <div class="p-term__txt p-term__txt--sub">
          <p class="c-description">
            当社のユーザー登録システムは、製品に同梱のユーザー登録ハガキからのご登録のほか、お手持ちのパソコンや携帯電話からユーザー登録のページにアクセスしてご登録いただけます。
            登録に伴いユーザーには以下の条件をお守りください。ユーザー登録のための書式にユーザーご自身に関する真実かつ正確なデータを入力し、当社に送信（発送）していただきます。
            上記の登録情報が常に真実かつ正確な内容を反映するものであるように、登録情報の変更が発生した場合はユーザーご自身にて適宜に修正していただきます。
            または当社カスタマーサポートデスクまで変更の旨をご報告ください。真実且つ正確なデータが提供されていないと当社が判断した場合、当社は当該ユーザーの登録情報を削除し、
            今後永続的に登録を拒否する権利を有しています。また、ユーザーが反社会的勢力の構成員もしくはその関係者である場合は、ユーザー登録システムのご利用をお断りいたします。
          </p>
        </div>  
      </li>
      <li class="p-terms__item">
        <div class="p-term__ttl p-term__ttl--sub">
          <p class="c-ttl">登録番号・メールアドレス・パスワードの管理について</p>
        </div>
        <div class="p-term__txt p-term__txt--sub">
          <p class="c-description">
            登録番号とご登録時に設定したメールアドレスとパスワードの管理はユーザーの責任において行っていただきます。登録番号・メールアドレス・パスワードを利用して行われた行為の責任は当該情報を保有しているユーザーの責任とみなします。万一当社の許可なく登録番号・メールアドレス・パスワードが第三者に利用された場合、または登録番号・メールアドレス・パスワードが第三者に漏洩してしまった場合はただちに当社にご連絡ください。また、登録作業及び登録内容の確認を一時的に終了される際には、その都度ログアウトをしてください。当社が運用する範囲外により発生した登録番号・メールアドレス・パスワードの漏洩、不正使用などから生じた損害については当社は一切の保証をいたしかねますのでご注意ください。
          </p>
        </div>  
      </li>
      <li class="p-terms__item">
        <div class="p-term__ttl p-term__ttl--sub">
          <p class="c-ttl">ユーザー登録システムの規定・制約について</p>
        </div>
        <div class="p-term__txt p-term__txt--sub">
          <p class="c-description">
            当社は、必要に応じてユーザー登録システムに関する諸規定を作成し、利用の制約をする（当社がユーザーのために割り当てる情報領域や、アクセス時間などについて規定することなど）権利を保有しています。当社は、ユーザー登録システムを通じてユーザー宛に送信される確認のメールや、ユーザーより送信されたお問い合わせ内容などを削除、または保存しなかったことについて一切の責任を負いません。また、当社は一定期間にわたって使用されていない登録情報やアカウントを削除する権利を保有しています。当社が必要と判断した場合には、ユーザーに通知することなく、いつでもユーザー登録システムに関する諸規定を改定することができるものとします。当社が必要と判断した場合には、ユーザーに通知することなく、いつでもユーザー登録システムの内容を変更、停止または中止することができるものとします。当社がユーザー登録システムの内容を変更、停止または中止した場合にも、ユーザーに対しては一切の責任を負わないものとします。
          </p>
        </div>  
      </li>
      <li class="p-terms__item">
        <div class="p-term__ttl p-term__ttl--sub">
          <p class="c-ttl">ユーザー登録システムの削除、停止について</p>
        </div>
        <div class="p-term__txt p-term__txt--sub">
          <p class="c-description">
            ユーザー登録システムが反社会的勢力またはその構成員や関係者によって取得または使用されたとき、もしくは使用されようとしたとき、および、当社が必要と判断した場合には、その時点でオンライン上に保有された登録情報を一部またはすべてを削除し、万一の場合ユーザー登録システムを削除、停止する権利を保有しています。この当社の権利は、ユーザーが利用規約の内容または趣旨に違反した、あるいは利用規約の精神に照らして不適切な行為を行ったと当社が判断した場合などにも行使されますが、それらに限らず当社自身の裁量で行使いたします。当社が必要と判断し特定のユーザーに対して登録ならびに製品の保証の提供を中止する場合、当社は、当該ユーザーの登録情報を無効とし、関連する情報や保存しているファイルを削除するとともに当該ユーザーが将来にわたって、当該情報、ファイルおよびサービスにアクセスすることを禁止することができるものとします。この場合、当社はサービスの提供中止に関し、当該ユーザーおよび第三者に対して一切責任を負わないものとします。
          </p>
        </div>  
      </li>
      <li class="p-terms__item">
        <div class="p-term__ttl p-term__ttl--sub">
          <p class="c-ttl">登録済製品の禁止事項</p>
        </div>
        <div class="p-term__txt p-term__txt--sub">
          <p class="c-description">
            ユーザーが登録された当社製品につきましては、製品の安全保持のため、その全部あるいは一部を問わず、商業目的による利用（使用、再生、複製、複写、販売、再販売など形態のいかんを問いません）を禁止いたします。
          </p>
        </div>  
      </li>
      <li class="p-terms__item">
        <div class="p-term__ttl p-term__ttl--sub">
          <p class="c-ttl">外部リンクについて</p>
        </div>
        <div class="p-term__txt p-term__txt--sub">
          <p class="c-description">
            当社外のサイトやリソースの利用（使用）可能性については当社は責任を有しておりません。また、当該サイトやリソースに包含され、または当該サイトやリソース上で利用が可能となっているコンテンツ、広告、製品、役務などについては一切責任を負うものではありません。従って、当社にはそれらのコンテンツ、広告、製品、サービスなどに起因または関連により発生した一切の損害（間接的である事、直接的である事を問いません）について賠償する責任はありません。
          </p>
        </div>  
      </li>
      <li class="p-terms__item">
        <div class="p-term__ttl p-term__ttl--sub">
          <p class="c-ttl">プライバシーポリシー</p>
        </div>
        <div class="p-term__txt p-term__txt--sub">
          <p class="c-description">
            当社が取得した登録情報は、当社のプライバシーポリシーに則り適正に取り扱われます。当社のプライバシーポリシーは別途こちらに記載のとおりです。なお、当社のユーザー登録システムのご利用にあたっては、プライバシーポリシーに定める事項にあわせて、以下の事項をご承認いただきます。ユーザーご自身で当社の提携先が提供するサービスの申し込みをしようとする際に、氏名、住所、連絡先など当社にすでに登録されている情報のうち、申し込みに必要な情報を当該サービス提供者に開示すること。提携先が提供するサービスなど、当社以外の会社が提供するサービスに関するお問い合わせを当社が受けた場合で、お問い合わせに対する回答をサービスの提供者から直接行うことが適切であると当社が判断した場合、お問い合わせの内容およびメールアドレスなどの回答先情報を当該サービス提供者に開示すること。料金のお支払いを遅滞したり、他のユーザーや第三者に損害を発生させるなど、利用規約に違反した方や、不正・不当な目的でサービスを利用しようとされる方のご利用をお断りするために、ユーザーのご利用態様、氏名や住所など個人を特定するための情報を提携先等に開示すること。
          </p>
        </div>  
      </li>
      <li class="p-terms__item">
        <div class="p-term__ttl p-term__ttl--sub">
          <p class="c-ttl">登録情報の保存、開示について</p>
        </div>
        <div class="p-term__txt p-term__txt--sub">
          <p class="c-description">
            公的機関により法令に従って情報の開示を要請されたとき、または法律手続上必要な場合、本規約を遵守していただくために必要な場合、第三者の権利を侵害している態様に対するクレームに対応するために必要な場合、当社またはユーザーの財産、権利、生命身体・業務等の安全や公益を守るために必要な場合など、当社が必要であると判断したときは、当社は登録製品に係る情報を保存し、または開示することができるものとします。
          </p>
        </div>  
      </li>
      <li class="p-terms__item">
        <div class="p-term__ttl p-term__ttl--sub">
          <p class="c-ttl">通知または連絡について</p>
        </div>
        <div class="p-term__txt p-term__txt--sub">
          <p class="c-description">
            登録されているユーザーへの通知または連絡が必要であると当社が判断した場合には、メールまたは郵便、電話を用いて行います。ユーザーが、当社に対し連絡が必要であると判断した場合には、それぞれ該当する窓口宛にメールまたは郵便、電話を用いて連絡を行うものとします。当社は、原則として来訪によるご連絡はお受けいたしかねます。
          </p>
        </div>  
      </li>
      <li class="p-terms__item">
        <div class="p-term__ttl p-term__ttl--sub">
          <p class="c-ttl">当社の財産権について</p>
        </div>
        <div class="p-term__txt p-term__txt--sub">
          <p class="c-description">
            ユーザーは以下の事項を認識する必要があります。個々の情報及び情報の集合体に関する財産権は当社に帰属します。ユーザー登録システムに関連して使用されているすべてのソフトウェア（以下「ソフトウェア」という）は、知的財産権に関する法令等により保護されている財産権および営業秘密を包含しています。ユーザー登録システム上に掲載されるコンテンツは、著作権法、商標法、意匠法等により保護されています。ユーザーは、当社に事前の文書による承諾を受けた場合を除き、ユーザー登録システムについて、または包含される内容（一部あるいは全部を問わず）について、複製、頒布、譲渡、貸与、転載、再利用しないことに同意するものとします。また、ユーザーが本条項に違反した場合は、ユーザー登録システムについて、または包含される内容（一部あるいは全部を問わず）について、複製、頒布、譲渡、貸与、転載、再利用を当社が差止する権利ならびに当該行為によってユーザーが得た利益相当額を当社が請求することができる権利を有することに、ユーザーは予め承諾しているものとします。当社はユーザーに対し、ユーザー登録システムのオブジェクトコードを一度に一台のコンピュータ上で実行することができる非独占的、一身専属的な権利を許諾します。ただし、ユーザーがソフトウェアを複写、修正、改変、二次利用したり、リバースエンジニアリング、逆アセンブルなどの方法でソースコードを解読したり、譲渡、再実施を許諾したりすることを禁止いたします。 ユーザーは当社によって提唱されているインターフェイス以外の手段を用いてユーザー登録システムにアクセスしてはならないものとします。
          </p>
        </div>  
      </li>
      <li class="p-terms__item">
        <div class="p-term__ttl p-term__ttl--sub">
          <p class="c-ttl">無保証事項</p>
        </div>
        <div class="p-term__txt p-term__txt--sub">
          <p class="c-description">
            ユーザー登録システムの利用（使用）は、ユーザーご自身の責任において行っていただきます。当社は登録情報の真偽、正確性、第三者の権利を侵害していないこと、提供の状態、アクセスの可能性、使用の状態については一切保証しておりません。
            当社は、<br>
            (1)サービスがユーザーの希望を満たすこと<br>
            (2)サービスの提供に不具合やエラーや障害が生じないこと<br>
            (3)サービスから得られる情報等が正確なものであること<br>
            (4)サービスを通じて入手できる製品、役務、情報などがユーザーの期待を満たすものであること(5)提供されるソフトウェアの不具合やバグが修正されることについては一切保証しておりません。<br>
            ユーザーが当社から直接またはサービスを通じてアドバイスや情報を得た場合であっても、本規約に規定されている内容を超えて保証を行うものではありません。なお、当該アドバイスや情報はユーザーから伝えられた限られた情報に基づいて行われるものですので、当該アドバイスや情報自身についてもその内容の真偽、適格性、正確性について保証するものではありません。
          </p>
        </div>  
      </li>
      <li class="p-terms__item">
        <div class="p-term__ttl p-term__ttl--sub">
          <p class="c-ttl">当社の賠償責任の制限</p>
        </div>
        <div class="p-term__txt p-term__txt--sub">
          <p class="c-description">
            ユーザーは、<br>
            (1)ユーザー登録システムを利用したこと、または利用ができなかったこと<br>
            (2) ユーザー登録システムを利用する際に役務を代替させるために費用を要したこと<br>
            (3)ユーザーの送信（発信）やデータへの不正アクセスや不正な改変がなされたこと<br>
            (4)第三者による送信（発信）行為、(5)その他サービスに関連する事項、に起因または関連して生じた一切の損害について、当社が賠償責任を負わないことに同意します。
          </p>
        </div>  
      </li>
      <li class="p-terms__item">
        <div class="p-term__ttl p-term__ttl--sub">
          <p class="c-ttl">準拠法、裁判管轄</p>
        </div>
        <div class="p-term__txt p-term__txt--sub">
          <p class="c-description">
            本規約の準拠法は日本法とします。また、サービスまたは本規約に関連して当社とユーザーの間で生じた紛争については東京地方裁判所を第一審専属管轄裁判所とします。
          </p>
        </div>  
      </li>
      <li class="p-terms__item">
        <div class="p-term__ttl p-term__ttl--sub">
          <p class="c-ttl">利用規約違反について</p>
        </div>
        <div class="p-term__txt p-term__txt--sub">
          <p class="c-description">
            他のユーザーが、本利用規約に違反するような行為等を発見された場合には当社カスタマーサポートデスクまでご連絡ください。
          </p>
        </div>  
      </li>
    </ul>
    <!-- チェックボックス -->
    <label class="">
      <span class=""><input class="" type="checkbox" name="" value="1" checked=""></span>セールやクーポンなどのお得な情報を受け取る
      <input class="" type="hidden" name="" value="0" disabled="">
    </label>
    <!-- ボタン -->
    <div class="p-btnWrap">
        <button type="submit" class="c-btn" id="register_form_button" href="http://localhost:8082/register/account">アカウント情報の入力へ</button>
    </div>
  </div>
  <div class="p-terms__foot">

  </div>
</div>
@endsection