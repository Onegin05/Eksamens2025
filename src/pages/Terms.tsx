
import React from "react";
import { Card, CardContent } from "@/components/ui/card";
import { FileText } from "lucide-react";

const Terms = () => {
  return (
    <div className="container mx-auto px-4 py-12">
      <div className="max-w-4xl mx-auto">
        <div className="mb-12 text-center">
          <div className="inline-block p-2 bg-green-100 rounded-lg text-green-700 mb-4">
            <FileText className="h-6 w-6" />
          </div>
          <h1 className="text-4xl font-bold mb-4">Lietošanas Noteikumi</h1>
          <p className="text-lg text-gray-600">
            Pēdējo reizi atjaunināta: 2023. gada 1. maijā
          </p>
        </div>

        <Card className="mb-8">
          <CardContent className="p-8">
            <div className="prose prose-green max-w-none">
              <h2 className="text-2xl font-bold mb-4">1. Ievads</h2>
              <p className="mb-4">
                Laipni lūdzam ZaļāAugsme! Šie Lietošanas noteikumi ("Noteikumi") regulē jūsu piekļuvi un vietnes ZaļāAugsme ("Vietne") un ar to saistīto pakalpojumu ("Pakalpojumi") lietošanu. Izlasiet šos noteikumus uzmanīgi, pirms sākat lietot mūsu Vietni.
              </p>
              <p className="mb-4">
                Piekļūstot vai izmantojot mūsu Vietni, jūs piekrītat ievērot šos Noteikumus. Ja jūs nepiekrītat kādai no šo Noteikumu daļām, jums nav atļauts piekļūt Vietnei vai izmantot mūsu Pakalpojumus.
              </p>

              <h2 className="text-2xl font-bold mt-8 mb-4">2. Definīcijas</h2>
              <ul className="list-disc pl-5 mb-4 space-y-2">
                <li><strong>"Vietne"</strong> attiecas uz ZaļāAugsme vietni, kas pieejama domēnā www.zalaugusme.lv;</li>
                <li><strong>"Pakalpojumi"</strong> attiecas uz visiem pakalpojumiem, ko piedāvā ZaļāAugsme, ieskaitot, bet neaprobežojoties ar finanšu kalkulatoriem, izglītojošiem materiāliem un konsultācijām;</li>
                <li><strong>"Lietotājs"</strong> (vai "jūs") attiecas uz jebkuru personu, kas piekļūst vai izmanto Vietni vai Pakalpojumus;</li>
                <li><strong>"Saturs"</strong> attiecas uz visu informāciju un materiāliem, kas pieejami Vietnē, ieskaitot, bet neaprobežojoties ar tekstu, grafikiem, attēliem, video, audio un datorprogrammām.</li>
              </ul>

              <h2 className="text-2xl font-bold mt-8 mb-4">3. Pakalpojumu izmantošana</h2>
              <p className="mb-4">
                Mūsu Pakalpojumi ir paredzēti tikai informatīviem mērķiem. Mēs cenšamies sniegt precīzu un aktuālu informāciju, taču mēs neuzņemamies atbildību par jebkādām kļūdām vai nepilnībām saturā.
              </p>
              <p className="mb-4">
                Mūsu kalkulatori un finanšu rīki ir izstrādāti, lai palīdzētu jums pieņemt apzinātus finanšu lēmumus, bet tie nav paredzēti kā profesionālas finanšu konsultācijas aizvietotājs. Mēs iesakām konsultēties ar kvalificētu finanšu konsultantu, pirms pieņemat svarīgus finanšu lēmumus.
              </p>

              <h2 className="text-2xl font-bold mt-8 mb-4">4. Lietotāja reģistrācija</h2>
              <p className="mb-4">
                Dažiem mūsu Pakalpojumiem var būt nepieciešams izveidot lietotāja kontu. Jūs apņematies sniegt precīzu, aktuālu un pilnīgu informāciju reģistrācijas laikā un uzturēt to aktuālu.
              </p>
              <p className="mb-4">
                Jūs esat atbildīgs par sava konta drošības uzturēšanu, ieskaitot paroles aizsardzību. Jūs esat atbildīgs par visām darbībām, kas notiek jūsu kontā, neatkarīgi no tā, vai jūs tās autorizējat vai nē.
              </p>

              <h2 className="text-2xl font-bold mt-8 mb-4">5. Intelektuālā īpašuma tiesības</h2>
              <p className="mb-4">
                Vietne un viss tās saturs, funkcijas un funkcionalitāte pieder ZaļāAugsme vai tās licenciātiem. Vietne ir aizsargāta ar autortiesībām, preču zīmēm, patenttiesībām un citiem intelektuālā īpašuma tiesību likumiem.
              </p>
              <p className="mb-4">
                Jums nav atļauts kopēt, modificēt, izplatīt, pārdot, iznomāt, licencēt vai citādi izmantot Vietnes saturu bez mūsu rakstiskas atļaujas.
              </p>

              <h2 className="text-2xl font-bold mt-8 mb-4">6. Atbildības ierobežojums</h2>
              <p className="mb-4">
                ZaļāAugsme un tās amatpersonas, darbinieki, partneri un aģenti neatbild par jebkādiem tiešiem, netiešiem, nejaušiem, īpašiem, izrietošiem vai sodoši zaudējumiem, kas radušies jūsu Vietnes lietošanas rezultātā.
              </p>
              <p className="mb-4">
                Mēs negarantējam, ka mūsu Vietne būs nepārtraukta, savlaicīga, droša vai bez kļūdām, vai ka defekti tiks izlaboti. Vietne un tās saturs tiek nodrošināts "kā ir" un "kā pieejams".
              </p>

              <h2 className="text-2xl font-bold mt-8 mb-4">7. Noteikumu izmaiņas</h2>
              <p className="mb-4">
                Mēs paturam tiesības mainīt vai aizstāt šos Noteikumus jebkurā laikā pēc saviem ieskatiem. Visas izmaiņas stājas spēkā nekavējoties pēc to publicēšanas Vietnē.
              </p>
              <p className="mb-4">
                Jūsu turpmāka Vietnes lietošana pēc jebkādu izmaiņu veikšanas šajos Noteikumos nozīmē, ka jūs piekrītat jaunajiem noteikumiem.
              </p>

              <h2 className="text-2xl font-bold mt-8 mb-4">8. Piemērojamā likumdošana</h2>
              <p className="mb-4">
                Šie Noteikumi tiek regulēti un interpretēti saskaņā ar Latvijas Republikas likumiem, un jebkādi strīdi tiks risināti Latvijas Republikas tiesās.
              </p>

              <h2 className="text-2xl font-bold mt-8 mb-4">9. Sazinieties ar mums</h2>
              <p className="mb-4">
                Ja jums ir kādi jautājumi vai ierosinājumi par mūsu lietošanas noteikumiem, lūdzu, sazinieties ar mums:
              </p>
              <div className="mb-4">
                <p>ZaļāAugsme</p>
                <p>E-pasts: info@zalaugusme.lv</p>
                <p>Tālrunis: +371 29 123 456</p>
                <p>Adrese: Brīvības iela 123, Rīga, LV-1010, Latvija</p>
              </div>
            </div>
          </CardContent>
        </Card>
      </div>
    </div>
  );
};

export default Terms;
