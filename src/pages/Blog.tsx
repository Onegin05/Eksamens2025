
import React from "react";
import { Card, CardContent, CardFooter, CardHeader, CardTitle } from "@/components/ui/card";
import { Button } from "@/components/ui/button";
import { BookOpen, Calendar, User, ArrowRight } from "lucide-react";
import { Link } from "react-router-dom";

const blogPosts = [
  {
    id: 1,
    title: "Kā izveidot personīgo budžetu",
    excerpt: "Uzziniet, kā efektīvi plānot savus ieņēmumus un izdevumus, lai sasniegtu finansiālos mērķus.",
    author: "Anna Kalniņa",
    date: "2023-10-15",
    category: "Budžets",
    image: "https://images.unsplash.com/photo-1554224155-6726b3ff858f?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1011&q=80"
  },
  {
    id: 2,
    title: "Ieguldīšanas pamati iesācējiem",
    excerpt: "Vienkāršs ceļvedis par to, kā sākt ieguldīt un izveidot diversificētu ieguldījumu portfeli.",
    author: "Jānis Bērziņš",
    date: "2023-09-28",
    category: "Ieguldījumi",
    image: "https://images.unsplash.com/photo-1535320903710-d993d3d77d29?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1170&q=80"
  },
  {
    id: 3,
    title: "Kā ietaupīt naudu ikdienā",
    excerpt: "Praktiski padomi, kas palīdzēs samazināt ikdienas izdevumus un veidot uzkrājumus.",
    author: "Linda Ozola",
    date: "2023-08-10",
    category: "Ietaupījumi",
    image: "https://images.unsplash.com/photo-1607863680198-23d4b2565df0?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1170&q=80"
  },
  {
    id: 4,
    title: "Pensijas plānošana jauniem pieaugušajiem",
    excerpt: "Kāpēc par pensiju jāsāk domāt jau tagad un kādi soļi jāveic, lai nodrošinātu stabilu nākotni.",
    author: "Kārlis Eglītis",
    date: "2023-07-22",
    category: "Pensija",
    image: "https://images.unsplash.com/photo-1551524612-4b158646bc05?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1025&q=80"
  },
  {
    id: 5,
    title: "Kredīta vēstures uzlabošana",
    excerpt: "Soļi, kas jāveic, lai uzlabotu savu kredīta vēsturi un nodrošinātu labākus aizdevumu nosacījumus nākotnē.",
    author: "Māra Liepiņa",
    date: "2023-06-14",
    category: "Kredīts",
    image: "https://images.unsplash.com/photo-1563013544-824ae1b704d3?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1170&q=80"
  },
  {
    id: 6,
    title: "Finanšu izglītība bērniem",
    excerpt: "Kā iemācīt bērniem naudas vērtību un veidot veselīgas finanšu paradumu jau no mazotnes.",
    author: "Ieva Zariņa",
    date: "2023-05-19",
    category: "Ģimenes finanses",
    image: "https://images.unsplash.com/photo-1554224155-8d04cb21cd6c?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1011&q=80"
  }
];

const Blog = () => {
  return (
    <div className="container mx-auto px-4 py-12">
      <div className="max-w-5xl mx-auto">
        <div className="mb-12 text-center">
          <div className="inline-block p-2 bg-green-100 rounded-lg text-green-700 mb-4">
            <BookOpen className="h-6 w-6" />
          </div>
          <h1 className="text-4xl font-bold mb-4">Finanšu Blogs</h1>
          <p className="text-lg text-gray-600 max-w-2xl mx-auto">
            Paplašiniet savas zināšanas par personīgajām finansēm ar mūsu jaunākajiem rakstiem un padomiem labākai finanšu pārvaldībai.
          </p>
        </div>

        <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
          {blogPosts.map((post) => (
            <Card key={post.id} className="flex flex-col h-full overflow-hidden hover:shadow-lg transition-shadow duration-300">
              <div className="h-48 overflow-hidden">
                <img
                  src={post.image}
                  alt={post.title}
                  className="w-full h-full object-cover hover:scale-105 transition-transform duration-300"
                />
              </div>
              <CardHeader className="pb-2">
                <div className="flex items-center text-sm text-gray-500 mb-2">
                  <span className="bg-green-100 text-green-800 text-xs px-2 py-1 rounded">
                    {post.category}
                  </span>
                </div>
                <CardTitle className="text-xl hover:text-green-600 transition-colors">
                  {post.title}
                </CardTitle>
              </CardHeader>
              <CardContent className="pb-2 flex-grow">
                <p className="text-gray-600">{post.excerpt}</p>
              </CardContent>
              <CardFooter className="pt-2 border-t border-gray-100">
                <div className="flex items-center justify-between w-full text-sm">
                  <div className="flex items-center gap-2 text-gray-500">
                    <User className="h-4 w-4" />
                    <span>{post.author}</span>
                  </div>
                  <div className="flex items-center gap-2 text-gray-500">
                    <Calendar className="h-4 w-4" />
                    <span>{new Date(post.date).toLocaleDateString('lv-LV')}</span>
                  </div>
                </div>
              </CardFooter>
              <div className="px-6 pb-6">
                <Button variant="outline" className="w-full group" asChild>
                  <Link to={`/blog/${post.id}`}>
                    Lasīt vairāk
                    <ArrowRight className="ml-2 h-4 w-4 group-hover:translate-x-1 transition-transform" />
                  </Link>
                </Button>
              </div>
            </Card>
          ))}
        </div>
      </div>
    </div>
  );
};

export default Blog;
