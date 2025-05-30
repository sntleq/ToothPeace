xPGDMP  7                    }            toothpeace2    17.4    17.4 Z    �           0    0    ENCODING    ENCODING        SET client_encoding = 'UTF8';
                           false            �           0    0 
   STDSTRINGS 
   STDSTRINGS     (   SET standard_conforming_strings = 'on';
                           false            �           0    0 
   SEARCHPATH 
   SEARCHPATH     8   SELECT pg_catalog.set_config('search_path', '', false);
                           false            �           1262    35394    toothpeace2    DATABASE     q   CREATE DATABASE toothpeace2 WITH TEMPLATE = template0 ENCODING = 'UTF8' LOCALE_PROVIDER = libc LOCALE = 'en-US';
    DROP DATABASE toothpeace2;
                     postgres    false            �            1259    35395    admin_controls    TABLE     {   CREATE TABLE public.admin_controls (
    key character varying(255) NOT NULL,
    value character varying(255) NOT NULL
);
 "   DROP TABLE public.admin_controls;
       public         heap r       postgres    false            �            1259    35400    admins    TABLE     �   CREATE TABLE public.admins (
    id bigint NOT NULL,
    email character varying(100) NOT NULL,
    password character varying(255) NOT NULL
);
    DROP TABLE public.admins;
       public         heap r       postgres    false            �            1259    35403 
   admins_id_seq    SEQUENCE     v   CREATE SEQUENCE public.admins_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 $   DROP SEQUENCE public.admins_id_seq;
       public               postgres    false    218            �           0    0 
   admins_id_seq    SEQUENCE OWNED BY     ?   ALTER SEQUENCE public.admins_id_seq OWNED BY public.admins.id;
          public               postgres    false    219            �            1259    35404    appointment_categories    TABLE     �   CREATE TABLE public.appointment_categories (
    id bigint NOT NULL,
    name character varying(255) NOT NULL,
    is_active boolean DEFAULT true NOT NULL
);
 *   DROP TABLE public.appointment_categories;
       public         heap r       postgres    false            �            1259    35408    appointment_categories_id_seq    SEQUENCE     �   CREATE SEQUENCE public.appointment_categories_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 4   DROP SEQUENCE public.appointment_categories_id_seq;
       public               postgres    false    220            �           0    0    appointment_categories_id_seq    SEQUENCE OWNED BY     _   ALTER SEQUENCE public.appointment_categories_id_seq OWNED BY public.appointment_categories.id;
          public               postgres    false    221            �            1259    35409    appointment_types    TABLE     �   CREATE TABLE public.appointment_types (
    id bigint NOT NULL,
    name character varying(255) NOT NULL,
    duration integer NOT NULL,
    is_active boolean DEFAULT true NOT NULL,
    appointment_category_id bigint NOT NULL
);
 %   DROP TABLE public.appointment_types;
       public         heap r       postgres    false            �            1259    35413    appointment_types_id_seq    SEQUENCE     �   CREATE SEQUENCE public.appointment_types_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 /   DROP SEQUENCE public.appointment_types_id_seq;
       public               postgres    false    222            �           0    0    appointment_types_id_seq    SEQUENCE OWNED BY     U   ALTER SEQUENCE public.appointment_types_id_seq OWNED BY public.appointment_types.id;
          public               postgres    false    223            �            1259    35414    appointments    TABLE       CREATE TABLE public.appointments (
    id bigint NOT NULL,
    date date NOT NULL,
    "time" time(0) without time zone NOT NULL,
    is_active boolean DEFAULT true NOT NULL,
    patient_id bigint NOT NULL,
    dentist_id bigint NOT NULL,
    appointment_type_id bigint NOT NULL
);
     DROP TABLE public.appointments;
       public         heap r       postgres    false            �            1259    35418    appointments_id_seq    SEQUENCE     |   CREATE SEQUENCE public.appointments_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 *   DROP SEQUENCE public.appointments_id_seq;
       public               postgres    false    224            �           0    0    appointments_id_seq    SEQUENCE OWNED BY     K   ALTER SEQUENCE public.appointments_id_seq OWNED BY public.appointments.id;
          public               postgres    false    225            �            1259    35434    dentist_services    TABLE     �   CREATE TABLE public.dentist_services (
    id bigint NOT NULL,
    dentist_id bigint NOT NULL,
    appointment_type_id bigint NOT NULL
);
 $   DROP TABLE public.dentist_services;
       public         heap r       postgres    false            �            1259    35437    dentist_services_id_seq    SEQUENCE     �   CREATE SEQUENCE public.dentist_services_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 .   DROP SEQUENCE public.dentist_services_id_seq;
       public               postgres    false    226            �           0    0    dentist_services_id_seq    SEQUENCE OWNED BY     S   ALTER SEQUENCE public.dentist_services_id_seq OWNED BY public.dentist_services.id;
          public               postgres    false    227            �            1259    35438    dentists    TABLE     �  CREATE TABLE public.dentists (
    id bigint NOT NULL,
    first_name character varying(20) NOT NULL,
    last_name character varying(20) NOT NULL,
    email character varying(100) NOT NULL,
    dob date NOT NULL,
    password character varying(255) NOT NULL,
    is_active boolean DEFAULT true NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);
    DROP TABLE public.dentists;
       public         heap r       postgres    false            �            1259    35442    dentists_id_seq    SEQUENCE     x   CREATE SEQUENCE public.dentists_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 &   DROP SEQUENCE public.dentists_id_seq;
       public               postgres    false    228            �           0    0    dentists_id_seq    SEQUENCE OWNED BY     C   ALTER SEQUENCE public.dentists_id_seq OWNED BY public.dentists.id;
          public               postgres    false    229            �            1259    35443 
   migrations    TABLE     �   CREATE TABLE public.migrations (
    id integer NOT NULL,
    migration character varying(255) NOT NULL,
    batch integer NOT NULL
);
    DROP TABLE public.migrations;
       public         heap r       postgres    false            �            1259    35446    migrations_id_seq    SEQUENCE     �   CREATE SEQUENCE public.migrations_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 (   DROP SEQUENCE public.migrations_id_seq;
       public               postgres    false    230            �           0    0    migrations_id_seq    SEQUENCE OWNED BY     G   ALTER SEQUENCE public.migrations_id_seq OWNED BY public.migrations.id;
          public               postgres    false    231            �            1259    35447    password_resets_dentists    TABLE     �   CREATE TABLE public.password_resets_dentists (
    email character varying(255) NOT NULL,
    token character varying(255) NOT NULL,
    created_at timestamp(0) without time zone,
    attempts integer DEFAULT 0
);
 ,   DROP TABLE public.password_resets_dentists;
       public         heap r       postgres    false            �            1259    35452    password_resets_patients    TABLE     �   CREATE TABLE public.password_resets_patients (
    email character varying(255) NOT NULL,
    token character varying(255) NOT NULL,
    created_at timestamp(0) without time zone,
    attempts integer DEFAULT 0
);
 ,   DROP TABLE public.password_resets_patients;
       public         heap r       postgres    false            �            1259    35457    patients    TABLE     d  CREATE TABLE public.patients (
    id bigint NOT NULL,
    first_name character varying(20) NOT NULL,
    last_name character varying(20) NOT NULL,
    email character varying(100) NOT NULL,
    dob date NOT NULL,
    password character varying(255) NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);
    DROP TABLE public.patients;
       public         heap r       postgres    false            �            1259    35460    patients_id_seq    SEQUENCE     x   CREATE SEQUENCE public.patients_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 &   DROP SEQUENCE public.patients_id_seq;
       public               postgres    false    234            �           0    0    patients_id_seq    SEQUENCE OWNED BY     C   ALTER SEQUENCE public.patients_id_seq OWNED BY public.patients.id;
          public               postgres    false    235            �            1259    35461    sessions    TABLE     �   CREATE TABLE public.sessions (
    id character varying(255) NOT NULL,
    user_id bigint,
    ip_address character varying(45),
    user_agent text,
    payload text NOT NULL,
    last_activity integer NOT NULL
);
    DROP TABLE public.sessions;
       public         heap r       postgres    false            �            1259    35466 	   timeslots    TABLE       CREATE TABLE public.timeslots (
    id bigint NOT NULL,
    day_of_week character varying(255) NOT NULL,
    start_time time(0) without time zone NOT NULL,
    end_time time(0) without time zone NOT NULL,
    CONSTRAINT timeslots_day_of_week_check CHECK (((day_of_week)::text = ANY (ARRAY[('0'::character varying)::text, ('1'::character varying)::text, ('2'::character varying)::text, ('3'::character varying)::text, ('4'::character varying)::text, ('5'::character varying)::text, ('6'::character varying)::text])))
);
    DROP TABLE public.timeslots;
       public         heap r       postgres    false            �            1259    35470    timeslots_id_seq    SEQUENCE     y   CREATE SEQUENCE public.timeslots_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 '   DROP SEQUENCE public.timeslots_id_seq;
       public               postgres    false    237            �           0    0    timeslots_id_seq    SEQUENCE OWNED BY     E   ALTER SEQUENCE public.timeslots_id_seq OWNED BY public.timeslots.id;
          public               postgres    false    238            �           2604    35476 	   admins id    DEFAULT     f   ALTER TABLE ONLY public.admins ALTER COLUMN id SET DEFAULT nextval('public.admins_id_seq'::regclass);
 8   ALTER TABLE public.admins ALTER COLUMN id DROP DEFAULT;
       public               postgres    false    219    218            �           2604    35477    appointment_categories id    DEFAULT     �   ALTER TABLE ONLY public.appointment_categories ALTER COLUMN id SET DEFAULT nextval('public.appointment_categories_id_seq'::regclass);
 H   ALTER TABLE public.appointment_categories ALTER COLUMN id DROP DEFAULT;
       public               postgres    false    221    220            �           2604    35478    appointment_types id    DEFAULT     |   ALTER TABLE ONLY public.appointment_types ALTER COLUMN id SET DEFAULT nextval('public.appointment_types_id_seq'::regclass);
 C   ALTER TABLE public.appointment_types ALTER COLUMN id DROP DEFAULT;
       public               postgres    false    223    222            �           2604    35479    appointments id    DEFAULT     r   ALTER TABLE ONLY public.appointments ALTER COLUMN id SET DEFAULT nextval('public.appointments_id_seq'::regclass);
 >   ALTER TABLE public.appointments ALTER COLUMN id DROP DEFAULT;
       public               postgres    false    225    224            �           2604    35483    dentist_services id    DEFAULT     z   ALTER TABLE ONLY public.dentist_services ALTER COLUMN id SET DEFAULT nextval('public.dentist_services_id_seq'::regclass);
 B   ALTER TABLE public.dentist_services ALTER COLUMN id DROP DEFAULT;
       public               postgres    false    227    226            �           2604    35484    dentists id    DEFAULT     j   ALTER TABLE ONLY public.dentists ALTER COLUMN id SET DEFAULT nextval('public.dentists_id_seq'::regclass);
 :   ALTER TABLE public.dentists ALTER COLUMN id DROP DEFAULT;
       public               postgres    false    229    228            �           2604    35485 
   migrations id    DEFAULT     n   ALTER TABLE ONLY public.migrations ALTER COLUMN id SET DEFAULT nextval('public.migrations_id_seq'::regclass);
 <   ALTER TABLE public.migrations ALTER COLUMN id DROP DEFAULT;
       public               postgres    false    231    230            �           2604    35486    patients id    DEFAULT     j   ALTER TABLE ONLY public.patients ALTER COLUMN id SET DEFAULT nextval('public.patients_id_seq'::regclass);
 :   ALTER TABLE public.patients ALTER COLUMN id DROP DEFAULT;
       public               postgres    false    235    234            �           2604    35487    timeslots id    DEFAULT     l   ALTER TABLE ONLY public.timeslots ALTER COLUMN id SET DEFAULT nextval('public.timeslots_id_seq'::regclass);
 ;   ALTER TABLE public.timeslots ALTER COLUMN id DROP DEFAULT;
       public               postgres    false    238    237            �          0    35395    admin_controls 
   TABLE DATA           4   COPY public.admin_controls (key, value) FROM stdin;
    public               postgres    false    217   `n       �          0    35400    admins 
   TABLE DATA           5   COPY public.admins (id, email, password) FROM stdin;
    public               postgres    false    218   �n       �          0    35404    appointment_categories 
   TABLE DATA           E   COPY public.appointment_categories (id, name, is_active) FROM stdin;
    public               postgres    false    220   o       �          0    35409    appointment_types 
   TABLE DATA           c   COPY public.appointment_types (id, name, duration, is_active, appointment_category_id) FROM stdin;
    public               postgres    false    222   �o       �          0    35414    appointments 
   TABLE DATA           p   COPY public.appointments (id, date, "time", is_active, patient_id, dentist_id, appointment_type_id) FROM stdin;
    public               postgres    false    224   lq       �          0    35434    dentist_services 
   TABLE DATA           O   COPY public.dentist_services (id, dentist_id, appointment_type_id) FROM stdin;
    public               postgres    false    226   �q       �          0    35438    dentists 
   TABLE DATA           v   COPY public.dentists (id, first_name, last_name, email, dob, password, is_active, created_at, updated_at) FROM stdin;
    public               postgres    false    228   kr       �          0    35443 
   migrations 
   TABLE DATA           :   COPY public.migrations (id, migration, batch) FROM stdin;
    public               postgres    false    230   }s       �          0    35447    password_resets_dentists 
   TABLE DATA           V   COPY public.password_resets_dentists (email, token, created_at, attempts) FROM stdin;
    public               postgres    false    232   �t       �          0    35452    password_resets_patients 
   TABLE DATA           V   COPY public.password_resets_patients (email, token, created_at, attempts) FROM stdin;
    public               postgres    false    233   �t       �          0    35457    patients 
   TABLE DATA           k   COPY public.patients (id, first_name, last_name, email, dob, password, created_at, updated_at) FROM stdin;
    public               postgres    false    234   �t       �          0    35461    sessions 
   TABLE DATA           _   COPY public.sessions (id, user_id, ip_address, user_agent, payload, last_activity) FROM stdin;
    public               postgres    false    236   �u       �          0    35466 	   timeslots 
   TABLE DATA           J   COPY public.timeslots (id, day_of_week, start_time, end_time) FROM stdin;
    public               postgres    false    237   �w       �           0    0 
   admins_id_seq    SEQUENCE SET     ;   SELECT pg_catalog.setval('public.admins_id_seq', 1, true);
          public               postgres    false    219            �           0    0    appointment_categories_id_seq    SEQUENCE SET     K   SELECT pg_catalog.setval('public.appointment_categories_id_seq', 8, true);
          public               postgres    false    221            �           0    0    appointment_types_id_seq    SEQUENCE SET     G   SELECT pg_catalog.setval('public.appointment_types_id_seq', 35, true);
          public               postgres    false    223            �           0    0    appointments_id_seq    SEQUENCE SET     A   SELECT pg_catalog.setval('public.appointments_id_seq', 8, true);
          public               postgres    false    225            �           0    0    dentist_services_id_seq    SEQUENCE SET     G   SELECT pg_catalog.setval('public.dentist_services_id_seq', 114, true);
          public               postgres    false    227            �           0    0    dentists_id_seq    SEQUENCE SET     =   SELECT pg_catalog.setval('public.dentists_id_seq', 3, true);
          public               postgres    false    229            �           0    0    migrations_id_seq    SEQUENCE SET     @   SELECT pg_catalog.setval('public.migrations_id_seq', 16, true);
          public               postgres    false    231            �           0    0    patients_id_seq    SEQUENCE SET     =   SELECT pg_catalog.setval('public.patients_id_seq', 3, true);
          public               postgres    false    235            �           0    0    timeslots_id_seq    SEQUENCE SET     @   SELECT pg_catalog.setval('public.timeslots_id_seq', 180, true);
          public               postgres    false    238            �           2606    35490 "   admin_controls admin_controls_pkey 
   CONSTRAINT     a   ALTER TABLE ONLY public.admin_controls
    ADD CONSTRAINT admin_controls_pkey PRIMARY KEY (key);
 L   ALTER TABLE ONLY public.admin_controls DROP CONSTRAINT admin_controls_pkey;
       public                 postgres    false    217            �           2606    35492    admins admins_email_unique 
   CONSTRAINT     V   ALTER TABLE ONLY public.admins
    ADD CONSTRAINT admins_email_unique UNIQUE (email);
 D   ALTER TABLE ONLY public.admins DROP CONSTRAINT admins_email_unique;
       public                 postgres    false    218            �           2606    35494    admins admins_pkey 
   CONSTRAINT     P   ALTER TABLE ONLY public.admins
    ADD CONSTRAINT admins_pkey PRIMARY KEY (id);
 <   ALTER TABLE ONLY public.admins DROP CONSTRAINT admins_pkey;
       public                 postgres    false    218            �           2606    35496 2   appointment_categories appointment_categories_pkey 
   CONSTRAINT     p   ALTER TABLE ONLY public.appointment_categories
    ADD CONSTRAINT appointment_categories_pkey PRIMARY KEY (id);
 \   ALTER TABLE ONLY public.appointment_categories DROP CONSTRAINT appointment_categories_pkey;
       public                 postgres    false    220            �           2606    35498 (   appointment_types appointment_types_pkey 
   CONSTRAINT     f   ALTER TABLE ONLY public.appointment_types
    ADD CONSTRAINT appointment_types_pkey PRIMARY KEY (id);
 R   ALTER TABLE ONLY public.appointment_types DROP CONSTRAINT appointment_types_pkey;
       public                 postgres    false    222            �           2606    35500    appointments appointments_pkey 
   CONSTRAINT     \   ALTER TABLE ONLY public.appointments
    ADD CONSTRAINT appointments_pkey PRIMARY KEY (id);
 H   ALTER TABLE ONLY public.appointments DROP CONSTRAINT appointments_pkey;
       public                 postgres    false    224            �           2606    35508 &   dentist_services dentist_services_pkey 
   CONSTRAINT     d   ALTER TABLE ONLY public.dentist_services
    ADD CONSTRAINT dentist_services_pkey PRIMARY KEY (id);
 P   ALTER TABLE ONLY public.dentist_services DROP CONSTRAINT dentist_services_pkey;
       public                 postgres    false    226            �           2606    35510    dentists dentists_email_unique 
   CONSTRAINT     Z   ALTER TABLE ONLY public.dentists
    ADD CONSTRAINT dentists_email_unique UNIQUE (email);
 H   ALTER TABLE ONLY public.dentists DROP CONSTRAINT dentists_email_unique;
       public                 postgres    false    228            �           2606    35512    dentists dentists_pkey 
   CONSTRAINT     T   ALTER TABLE ONLY public.dentists
    ADD CONSTRAINT dentists_pkey PRIMARY KEY (id);
 @   ALTER TABLE ONLY public.dentists DROP CONSTRAINT dentists_pkey;
       public                 postgres    false    228            �           2606    35514    migrations migrations_pkey 
   CONSTRAINT     X   ALTER TABLE ONLY public.migrations
    ADD CONSTRAINT migrations_pkey PRIMARY KEY (id);
 D   ALTER TABLE ONLY public.migrations DROP CONSTRAINT migrations_pkey;
       public                 postgres    false    230            �           2606    35516 6   password_resets_dentists password_resets_dentists_pkey 
   CONSTRAINT     w   ALTER TABLE ONLY public.password_resets_dentists
    ADD CONSTRAINT password_resets_dentists_pkey PRIMARY KEY (email);
 `   ALTER TABLE ONLY public.password_resets_dentists DROP CONSTRAINT password_resets_dentists_pkey;
       public                 postgres    false    232            �           2606    35518 6   password_resets_patients password_resets_patients_pkey 
   CONSTRAINT     w   ALTER TABLE ONLY public.password_resets_patients
    ADD CONSTRAINT password_resets_patients_pkey PRIMARY KEY (email);
 `   ALTER TABLE ONLY public.password_resets_patients DROP CONSTRAINT password_resets_patients_pkey;
       public                 postgres    false    233            �           2606    35520    patients patients_email_unique 
   CONSTRAINT     Z   ALTER TABLE ONLY public.patients
    ADD CONSTRAINT patients_email_unique UNIQUE (email);
 H   ALTER TABLE ONLY public.patients DROP CONSTRAINT patients_email_unique;
       public                 postgres    false    234            �           2606    35522    patients patients_pkey 
   CONSTRAINT     T   ALTER TABLE ONLY public.patients
    ADD CONSTRAINT patients_pkey PRIMARY KEY (id);
 @   ALTER TABLE ONLY public.patients DROP CONSTRAINT patients_pkey;
       public                 postgres    false    234            �           2606    35524    sessions sessions_pkey 
   CONSTRAINT     T   ALTER TABLE ONLY public.sessions
    ADD CONSTRAINT sessions_pkey PRIMARY KEY (id);
 @   ALTER TABLE ONLY public.sessions DROP CONSTRAINT sessions_pkey;
       public                 postgres    false    236            �           2606    35526    timeslots timeslots_pkey 
   CONSTRAINT     V   ALTER TABLE ONLY public.timeslots
    ADD CONSTRAINT timeslots_pkey PRIMARY KEY (id);
 B   ALTER TABLE ONLY public.timeslots DROP CONSTRAINT timeslots_pkey;
       public                 postgres    false    237            �           1259    35529    sessions_last_activity_index    INDEX     Z   CREATE INDEX sessions_last_activity_index ON public.sessions USING btree (last_activity);
 0   DROP INDEX public.sessions_last_activity_index;
       public                 postgres    false    236            �           1259    35530    sessions_user_id_index    INDEX     N   CREATE INDEX sessions_user_id_index ON public.sessions USING btree (user_id);
 *   DROP INDEX public.sessions_user_id_index;
       public                 postgres    false    236            �           2606    35531 C   appointment_types appointment_types_appointment_category_id_foreign 
   FK CONSTRAINT     �   ALTER TABLE ONLY public.appointment_types
    ADD CONSTRAINT appointment_types_appointment_category_id_foreign FOREIGN KEY (appointment_category_id) REFERENCES public.appointment_categories(id);
 m   ALTER TABLE ONLY public.appointment_types DROP CONSTRAINT appointment_types_appointment_category_id_foreign;
       public               postgres    false    222    220    4821            �           2606    35536 5   appointments appointments_appointment_type_id_foreign 
   FK CONSTRAINT     �   ALTER TABLE ONLY public.appointments
    ADD CONSTRAINT appointments_appointment_type_id_foreign FOREIGN KEY (appointment_type_id) REFERENCES public.appointment_types(id);
 _   ALTER TABLE ONLY public.appointments DROP CONSTRAINT appointments_appointment_type_id_foreign;
       public               postgres    false    4823    222    224            �           2606    35541 ,   appointments appointments_dentist_id_foreign 
   FK CONSTRAINT     �   ALTER TABLE ONLY public.appointments
    ADD CONSTRAINT appointments_dentist_id_foreign FOREIGN KEY (dentist_id) REFERENCES public.dentists(id);
 V   ALTER TABLE ONLY public.appointments DROP CONSTRAINT appointments_dentist_id_foreign;
       public               postgres    false    4831    228    224            �           2606    35546 ,   appointments appointments_patient_id_foreign 
   FK CONSTRAINT     �   ALTER TABLE ONLY public.appointments
    ADD CONSTRAINT appointments_patient_id_foreign FOREIGN KEY (patient_id) REFERENCES public.patients(id);
 V   ALTER TABLE ONLY public.appointments DROP CONSTRAINT appointments_patient_id_foreign;
       public               postgres    false    234    4841    224            �           2606    35566 =   dentist_services dentist_services_appointment_type_id_foreign 
   FK CONSTRAINT     �   ALTER TABLE ONLY public.dentist_services
    ADD CONSTRAINT dentist_services_appointment_type_id_foreign FOREIGN KEY (appointment_type_id) REFERENCES public.appointment_types(id);
 g   ALTER TABLE ONLY public.dentist_services DROP CONSTRAINT dentist_services_appointment_type_id_foreign;
       public               postgres    false    222    4823    226            �           2606    35571 4   dentist_services dentist_services_dentist_id_foreign 
   FK CONSTRAINT     �   ALTER TABLE ONLY public.dentist_services
    ADD CONSTRAINT dentist_services_dentist_id_foreign FOREIGN KEY (dentist_id) REFERENCES public.dentists(id);
 ^   ALTER TABLE ONLY public.dentist_services DROP CONSTRAINT dentist_services_dentist_id_foreign;
       public               postgres    false    228    4831    226            �   (   x��/H͋/��M�4��20 "����T��!L,F��� 38�      �   ^   x�3�LL���sH�H�-�I�K���T1�T14R�4)��p�w��/4MJ	5����0(r�M*N/6.)I��tv��rs3��������� ��      �   }   x�e�;�0��)|��=P'J(i,g�p,��r��i@�|�f*�8#�C��ބ"����VxұzvtN92����gȬxO���������l���#�<�+k�~�]#k5��+��1�,D�==      �   �  x�mS�n�0</��?��zY�1V� h���\za��E�"
���ﻒM�
|"0��}�nc|��RR� /�C��3���������d�"��B����B�ښ?1�������
��y��Jh�QV⟻{� W�̑Đo,
�J�"h�Q\i�,���j�A��
�ԱE���^�8��H��w���X��\Ket{���Q�u)`�K��Y���F�9<{^퇖�4J�
�,�������O9�q�<
Y�P���J�K���3X�9�x��5=�mn���F#�b�cm�gPwR���u������D�Y�߰�o���d�bT��J�lxX���)f��GC�zR<q%�G�PO�[v�,]��vT�lF�XiZ3V2&D=�J�HN7 ��
��퉪X��{A�e1���r��������8���t)${�Ơ�b��ٟ:o��T���c�d�o      �   J   x�M��
�0Cѳ�K���B��3����}{��GQoP?�<n�;�_�����pn�լ���}��Z�^y.$0r�      �   �   x���
 �x��$�]����;݉�^�+Wbr�*LI̑lLK^̕|�'9��$�~��-�t$�����}�m�k��g?�����{+d�W� �JPNGp�Z�NWp���9�`�(���rxq�rxs�r�W�rxw�rxy5� ?	n(�      �     x�mνn�0����k]s�(0�`HR���)��K!�E*0%����Z:ëo8zT�e
�z.QJ������Q�^%�@������R�C0��O�dؚ����N�vz��r�^a?����\@�!��h�X�ii �dXH�m�m�H�L�{��rHL�*�u=�$?C��憬X��<��8��H�,o�?`c�&k�q��	f�KN���`i~.Y�i�>��j�No��:�(���Qr<��쨐�h�?�,˿#w�      �   �   x�m�[n� E��b*����҈`����(�/}ئԿ��ν�Ep��+� B�D��)Sȅ����w`�g��ة��V�cǍ5�)��*h��#&r��zS�3���Fҽ��t�׎�M�Ր7w�T^W�Mn�N��:���J�	�������J��Q�PF�A׋6%��)�ކ���Mi\hv���t�;-xM#y���A�-���֔���=�ǯ*�hЧ� }Ib��i���jk��_Q���1�	$��C      �   
   x������ � �      �   
   x������ � �      �      x�m��R�PEk�
ڐsυ��� �!���`D�ᙁ�����B�֬b�E� ��0F6��2�
�T��P	��t�U�A`���9T?eƹ����ڒ*ƻ⬽ݨ��!�`<� } U'k]�9'�����b�;_���� ���}�A��e^0�Ip��wUQ���F>m/�l�Bs�{�鰚s"��8�#� :e�ϣ�M]�JBx}���TK��:=��(�F�1���������9�9'~ʢ(�Z�u!      �   �  x�5OM��@=믘�V%��1Hm�`�E\�I6��T.|���������CW����k�:��x�h���0�-�+��V��5��?}�-�&pe}!
'���R[H`�KZ�7�S �	 R�@��9X׵Ȃ,~��RS���eC��
^d�ɒ���|��l	��A�ct�_'�����'7�S���nM��'!� �4=�C�
C��F��Փ���U�}���0�dì�P��n"��a�$s�í����--;�?�5·�d�i)��̉l#L��&eˉ��oa�g)ݬ�w_u8Oޱ��^n#b�[lg��:�F�M���܍<)����
�+;�}d������רm��k���g��ɪ��a�8
������}��
'�z�q^��1.Q����O)����-�e��ֺ��e����|�����-�'m�Ѫ#��cuU7t����b:��3���      �     x�mϻm0C��o�@ٙ%����Ѐ
�tWM���"�����f��9T���3�����q��p;�����z��x^��<^����qx��uث�
ν���p���s��{����ν��������08��o�F��7νQpsoL8�Ƃso
�{SG�z��ܛ��ћ��L8�f��7ν9�ܛν%p�-��-�so��Go�{+��[��j8�քso-8�����uԫ�
ν���p��so�{����ν���;N�?_������g     
